<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert(
            [
                [
                    'blog_title' => 'Example',
                    'blog_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed tempus urna et pharetra pharetra massa massa ultricies mi. Tristique senectus et netus et malesuada. Urna neque viverra justo nec ultrices dui sapien. Turpis tincidunt id aliquet risus feugiat in ante metus dictum. Quis auctor elit sed vulputate mi sit amet. Leo a diam sollicitudin tempor id. Ut tellus elementum sagittis vitae et leo. Convallis a cras semper auctor neque vitae. Neque gravida in fermentum et sollicitudin ac orci. Rhoncus mattis rhoncus urna neque viverra.

                    Non nisi est sit amet facilisis magna. Duis at tellus at urna condimentum. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Ut faucibus pulvinar elementum integer enim. Etiam erat velit scelerisque in. Consectetur lorem donec massa sapien faucibus et molestie ac feugiat. Habitant morbi tristique senectus et netus et. Viverra suspendisse potenti nullam ac tortor vitae. Nisl tincidunt eget nullam non nisi est. Malesuada pellentesque elit eget gravida cum sociis natoque. Viverra adipiscing at in tellus. Tincidunt ornare massa eget egestas purus viverra accumsan.
                    
                    Lectus magna fringilla urna porttitor rhoncus dolor purus non. Laoreet sit amet cursus sit amet dictum sit. Turpis massa tincidunt dui ut ornare. Mattis enim ut tellus elementum sagittis vitae et leo. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Gravida in fermentum et sollicitudin. Risus viverra adipiscing at in tellus integer feugiat scelerisque varius. At quis risus sed vulputate odio ut. Auctor eu augue ut lectus arcu bibendum at varius. Orci dapibus ultrices in iaculis nunc sed augue lacus. Molestie nunc non blandit massa enim nec. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Ut pharetra sit amet aliquam id diam maecenas ultricies.
                    
                    Venenatis a condimentum vitae sapien. Nunc id cursus metus aliquam eleifend mi in. Pretium vulputate sapien nec sagittis aliquam. Magna ac placerat vestibulum lectus. Lobortis feugiat vivamus at augue eget arcu dictum varius duis. Ornare lectus sit amet est. Auctor augue mauris augue neque gravida in fermentum et sollicitudin. Sed id semper risus in. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Pharetra magna ac placerat vestibulum lectus mauris ultrices eros. Sed risus ultricies tristique nulla aliquet. Fermentum et sollicitudin ac orci phasellus egestas. Nisl suscipit adipiscing bibendum est ultricies integer quis auctor. Mollis nunc sed id semper.
                    
                    Sed risus ultricies tristique nulla aliquet enim. Mattis aliquam faucibus purus in massa tempor. Turpis nunc eget lorem dolor sed viverra. Aliquam faucibus purus in massa tempor nec feugiat. Hac habitasse platea dictumst quisque sagittis purus sit amet volutpat. Vel pharetra vel turpis nunc eget. Nunc lobortis mattis aliquam faucibus purus in. Sed ullamcorper morbi tincidunt ornare massa eget egestas. In arcu cursus euismod quis viverra nibh cras. Amet cursus sit amet dictum sit amet justo donec. Quis viverra nibh cras pulvinar mattis nunc sed. Non quam lacus suspendisse faucibus interdum posuere.',
                    
                    
                ]
            ]
        );
    }
}
