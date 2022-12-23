 <?php

 use Ramsey\Uuid\Uuid;
 use App\Models\Users;
 use App\Models\UsersActivities;
 use App\Models\Auths;
 use App\Models\Admin\UsersNotifications;
 use Carbon\Carbon;
 use App\Models\Languages;
 use App\Models\LanguagesWords;
 use App\Models\LanguagesTranslates;

     # REQUEST HATASI OLUP OLMADIĞINI INPUTLAR İÇİN KONTROL EDER
     function CheckInput($input_name,$errors){

         if(@$errors->getMessages()[$input_name]){
             return "error";
         }else{
             return "";
         }

     }

     # KULLANICININ SON ŞİFRE DEĞİŞTİRME TARİHİNİ GETİRİR
     function getLastPasswordChange($user_id = 0){

         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $find = UsersActivities::where("user_id","=",$user_id)->where("tag","=","change_password")->orderBy("id","DESC")->first();

         if($find){
             return getDiffForHumans($find->created_at);
         }else{
             return "Hiç değiştirilmemiş !";
         }

     }

     # KULLANICININ SON ŞİFRE DEĞİŞTİRME TARİHİNİ GETİRİR
     function getLastLogin($user_id = 0){

         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $find = UsersActivities::where("user_id","=",$user_id)->where("tag","=","user_login")->where("operation","=","Sisteme giriş yaptı")->orderBy("id","DESC")->first();

         if($find){
             return getDateTime($find->created_at);
         }else{
             return "Hiç girmemiş !";
         }

     }

     # GEREKSİZ BOŞLUKLARI TEMİZLEME
     function replaceSpace($string){
         $string = preg_replace("/\s+/", " ", $string);
         $string = trim($string);
         return $string;
     }

     # BİLDİRİM AYARINI KONTROL EDER
     function checkNotification($name,$user_id = 0){

         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $find = Users::find($user_id);

         if($find->notifications == null){
             return false;
         }else{

             $decode = json_decode($find->notifications);

             if(in_array($name,$decode)){
                 return true;
             }else{
                 return false;
             }

         }

     }

     # YETKİLERİ KONTROL EDER
     function checkAuths($name,$user_id = 0){
         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $find = Users::find($user_id);

         if($find->auth->auths == null){
             return false;
         }else{

             $decode = json_decode($find->auth->auths);

             if(in_array($name,$decode)){
                 return true;
             }else{
                 return false;
             }

         }
     }

     # TARİH VE SAATİ DÜZENLİ BİR FORMATTA VERİR
     function getDateTime($timestamp){

         $datetime = Carbon::createFromFormat("Y-m-d H:i:s",$timestamp);

         return $datetime->format("d.m.Y / H.i");

     }

     # TARİHİN ÜZERİNDEN NE KADAR SÜRE GEÇTİĞİNİ HESAPLAR
     function getDiffForHumans($timestamp){

         $datetime = Carbon::createFromFormat("Y-m-d H:i:s",$timestamp);

         return $datetime->diffForHumans();

     }

     # KULLANICI HAREKETLERİNİ GETİRİR
     function getHareketler($tag = "all",$take = 0,$order = "DESC",$user_id = 0){

         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $Logs = UsersActivities::where("user_id","=",$user_id);

         if($tag != "all"){
             $Logs = $Logs->where("tag","=",$tag);
         }

         $Logs = $Logs->orderBy("id",$order);

         if($take > 0){
             $Logs = $Logs->take($take)->get();
         }else{
             $Logs = $Logs->get();
         }

         return $Logs;

     }

     # YETKİLERİ GETİRİR
     function getAllAuths(){
         $All = Auths::get();
         return $All;
     }

     # DİLLERİ GETİRİR
     function getAllLanguages(){
         $All = Languages::get();
         return $All;
     }

     # KELİMELERİ GETİRİR
     function getAllWords(){
         $All = LanguagesWords::orderBy("id","DESC")->get();
         return $All;
     }

     # KULLANICILARI GETİRİR
     function getAllUsers(){
         $All = Users::get();
         return $All;
     }

     # KULLANICI HAREKETİ OLUŞTURUR
     function createLog($tag,$operation,$user_id = 0){

         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $findUser = Users::find($user_id);
         if($findUser->log_kayit == 1){
             $Log = new UsersActivities;

             $Log->user_id = $user_id;
             $Log->ip = Request::ip();
             $Log->browser = BrowserDetect::detect()->browserName();
             $Log->tag = $tag;
             $Log->operation = $operation;

             $Log->save();

             return $Log;

         }

     }

     # TÜM HAREKETLERİN SAYISINI VERİR
     function getAllActivitiesCount(){

         $Count = UsersActivities::get()->count();
         return $Count;

     }

     # TÜM OKUNMAMIŞ BİLDİRİMLERİ GETİRİR
     function getAllMyUnreadNotifications(){
         $getAllNotifications = UsersNotifications::where("user_id","=",getCurrentUser()->id)->where("read_state","=",0)->orderBy("id","DESC")->get();
         return $getAllNotifications;
     }

     # TÜM OKUNMUŞ BİLDİRİMLERİ GETİRİR
     function getAllMyReadNotifications(){
         $getAllNotifications = UsersNotifications::where("user_id","=",getCurrentUser()->id)->where("read_state","=",1)->orderBy("id","DESC")->get();
         return $getAllNotifications;
     }

     # TÜM OKUNMAMIŞ BİLDİRİMLERİN SAYISINI VERİR
     function getAllUnReadNotificationsCount(){

         $Count = UsersNotifications::where("read_state","=",0)->get()->count();
         return $Count;

     }

     # BİLDİRİM OLUŞTURUR
     function createNotification($icon,$renk,$icerik,$user_id = 0){

         if($user_id == 0){
             $user_id = getCurrentUser()->id;
         }

         $Ntf = new UsersNotifications;

         $Ntf->user_id = $user_id;
         $Ntf->read_state = 0;
         $Ntf->icon = $icon;
         $Ntf->renk = $renk;
         $Ntf->content = $icerik;

         $Ntf->save();

         return $Ntf;

     }

     # BENZERSİZ BİR KULLANICI TOKENİ OLUŞTURUR
     function GenerateUserToken(){

         do{
             $token = Uuid::uuid1()->toString();
         }while(Users::where("token","=",$token)->first() instanceof Users);

         return $token;

     }

     # GİRİŞ YAPMIŞ OLAN KULLANICIYI GETİRİR
     function getCurrentUser(){
         if(session_status() != PHP_SESSION_ACTIVE){
             session_start();
         }
         return Users::find($_SESSION['CURRENT_USER']->id);
     }

     function _wtf($string,$language = "tr_TR"){

         $findWord = LanguagesWords::where("word_key","=",$string)->first();
         if(!$findWord){
             $newWord = new LanguagesWords;
             $newWord->main_language = $language;
             $newWord->word_key = $string;
             $newWord->save();

             $newTranslate = new LanguagesTranslates;
             $newTranslate->word_id = $newWord->id;
             $newTranslate->language = $language;
             $newTranslate->word = $string;
             $newTranslate->save();

             foreach (getAllLanguages() as $lng){
                 if($lng->code != $language){
                     $newTranslate = new LanguagesTranslates;
                     $newTranslate->word_id = $newWord->id;
                     $newTranslate->language = $lng->code;
                     $newTranslate->save();
                 }
             }

             //DEVAMKE

         }else{
             $findWord_ = $findWord->translates()->where("language","=",getCurrentLanguge()->code)->first();
             return $findWord_->word;
         }

     }

     # SEÇİLEN DİLİ GETİRİR
     function getCurrentLanguge(){
         if(session_status() != PHP_SESSION_ACTIVE){
             session_start();
         }
         if(@$_SESSION['CURRENT_USER']) {
             return Users::find($_SESSION['CURRENT_USER']->id)->getLanguage();
         }else{
             $find = Languages::where("code","=",@$_SESSION['LANGUAGE'])->first();
             if($find){
                 return $find;
             }else{
                 $_SESSION['LANGUAGE'] = "tr_TR";
                 $find2 = Languages::where("code","=",@$_SESSION['LANGUAGE'])->first();
                 return $find2;
             }
         }
     }

     # MENU YETKİ KONTROLLERİ
     function mainMenuSubSearch($main_menu_subs,$auths){

     foreach ($main_menu_subs as $sub_menu){
         if(in_array("menu_".$sub_menu['id'],$auths)){
             return true;
         }
     }

     return false;

    }
     function mainMenuGroupMenuandSubMenuSearch($main_menus,$auths){

     foreach ($main_menus as $main_menu){
         if(@$main_menu['sub']){
             foreach ($main_menu['sub'] as $sub_menu){
                 if(in_array("menu_".$sub_menu['id'],$auths)){
                     return true;
                 }
             }
         }else{
             if(in_array("menu_".$main_menu['id'],$auths)){
                 return true;
             }
         }
     }

     return false;

    }
     function findRouteNameMenu($route_name){

     foreach (config("menu") as $menuGroupKey => $menuGroup){
         foreach ($menuGroup as $mainMenuKey => $mainMenu){
             if(@$mainMenu['sub']){
                 foreach ($mainMenu['sub'] as $subMenuKey => $subMenu){
                     if(strstr($route_name,$subMenu['route'])){
                         return $subMenu['id'];
                     }
                 }
             }else{
                 if(strstr($route_name,$mainMenu['route'])){
                     return $mainMenu['id'];
                 }
             }
         }
     }

     return 0;

    }
