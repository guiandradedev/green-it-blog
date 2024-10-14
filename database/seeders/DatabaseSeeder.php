<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\CollectionPoint;
use App\Models\Post;
use App\Models\PostPhoto;
use App\Models\User;
use App\Models\UserPhoto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Guilherme Andrade',
            'email' => 'gui@teste.com',
            'about' => 'Lorem ipsum dolor sit amet',
            'linkedin' => 'https://www.linkedin.com/in/guiandradedev/',
            'github' => 'https://github.com/guiandradedev',
            'username' => 'andrade'
        ]);
        
        $user_avatar = UserPhoto::create([
            'file_name'=>"5462680.png",
            'file_path'=>"/5462680.1728232796994-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>36553,
            'user_id'=>$user->id,
        ]);
        $user->update(['avatar_id'=>$user_avatar->id]);

        $post1 = Post::create([
            'title'=>'Queimadas da Amazônia',
            'subtitle'=>'Por que as queimadas são ruins?',
            'slug'=>'amazonia',
            'content'=> '<h1>Ea cupiditate voluptatum id assumenda dolores. </h1><p>Lorem ipsum dolor sit amet. Vel odio nesciunt <em>Et debitis</em> ea voluptas omnis sed recusandae placeat. Est quia voluptatesEt iusto aut dolorem natus ea iure quae est dolor aperiam eum possimus laboriosam. Et adipisci molestias est pariatur fugitab perspiciatis ab ratione ullam. </p><h2>Et unde praesentium et consequatur deleniti. </h2><p>Qui incidunt possimus <em>Rem cupiditate At amet consequatur</em>. Ut incidunt sequi et porro illum <strong>Et ipsa</strong>. Eos quia asperiores vel voluptas exercitationemEa amet sed vero ullam eos exercitationem nemo et perferendis perspiciatis. </p><h3>Ut itaque impedit ut architecto deserunt. </h3><p>Ad illo animi <strong>Ut voluptas non enim quasi aut dolor illum vel vero tempora</strong> et necessitatibus incidunt sit voluptatem corrupti? Ut aliquid quos ea totam illo <em>Aut veritatis ea perferendis aspernatur</em> quo quae quisquam et Quis magni sit quisquam officiis. Sed enim quibusdameos nihil et neque molestiae. </p><ul><li>Et recusandae aliquam aut voluptatem impedit non voluptates galisum. </li><li>Ut omnis accusantium ad ullam minus sit corporis reprehenderit sit eaque consequatur. </li><li>Qui laboriosam veniam non consequatur quis a dignissimos repellendus At accusantium omnis. </li><li>Et pariatur dolorum sed omnis sapiente. </li></ul><h4>In quis ducimus et natus rerum. </h4><p>Est ducimus labore ea dolorem rerum <a href="https://www.loremipzum.com" target="_blank">Quo rerum ea incidunt similique cum mollitia similique aut consequuntur modi</a>. Et velit deserunt est eligendi quod <em>Eum minima qui nesciunt nulla vel enim error</em>! </p><h5>Aut quasi esse nam natus eveniet in ratione tempora. </h5><p>Qui sint voluptatibus <em>Ex obcaecati qui provident voluptas ea quibusdam sunt nam minima sint</em>. Id architecto recusandae <strong>Eos deserunt aut fuga sunt est dolores galisum</strong> 33 quos omnis aut iste dignissimos et vitae cupiditate. </p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user->id
        ]);

        $photo1 = PostPhoto::create([
            'file_name'=>"5462680.png",
            'file_path'=>"/5462680.172823279699-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>36553,
            'post_id'=>$post1->id,
        ]);
        $post1->update(['thumbnail_id'=>$photo1->id]);


        $post1 = Post::create([
            'title'=>'Reducao do consumo de energia em data center',
            'subtitle'=>'lorem ipsum dolor sit amet, consectetur dispising elit',
            'slug'=>'reducao-do-consumo',
            'content'=> '<h1>33 porro minus qui iusto eaque et dolores cumque. </h1><p>Lorem ipsum dolor sit amet. Qui voluptas natusNon corrupti aut enim optio sit placeat amet. Aut mollitia quia <strong>A recusandae rem magnam soluta aut suscipit modi est alias sunt</strong> aut officiis nemo est nihil dolores. </p><ul><li>Aut labore dicta et quibusdam tenetur. </li><li>Vel quae libero est quae culpa. </li><li>Et aliquid consequatur qui ipsum dolorem aut voluptas omnis? </li><li>Eos quam fuga non quia officia ab possimus harum! </li></ul><h2>Nam harum exercitationem ut sint facilis. </h2><p>A dolores animi <a href="https://www.loremipzum.com" target="_blank">Aut illum et suscipit aspernatur est magni voluptatum</a> et harum odit. Et excepturi molestiae ab animi ipsamnam dolorem sed vero quia sit fugit voluptas. Non dolores deserunt ea neque illumnon quasi. Qui voluptatem nihilNam consequuntur id quidem eligendi est provident nihil qui modi nihil. </p><h3>Aut dolores veniam a fugit molestiae. </h3><p>Ut molestiae blanditiis <em>Et consectetur eum quia dolor vel debitis cupiditate</em> et galisum dicta et provident nisi. Sed ratione consequatur qui aperiam voluptas <strong>Aut nemo ab quos adipisci ea omnis reiciendis sit fuga dolores</strong>. </p><h4>Et galisum voluptate aut dolor ipsam eos Quis ipsum! </h4><p>Hic ullam voluptatum quo omnis itaque <a href="https://www.loremipzum.com" target="_blank">Qui animi nam accusamus consequatur aut voluptatem iure rem natus voluptatem</a>. Ut minus suscipit <strong>Eos quidem eos esse aspernatur et alias amet et dicta fugiat</strong> et dicta placeat in mollitia tenetur! Ut quod magni et nesciunt voluptas <em>33 quod aut repellat reprehenderit et beatae laborum ab velit pariatur</em>. Qui provident molestiasNon aliquam non corporis sint vel illo necessitatibus quo velit unde sit voluptate exercitationem. </p><h5>Ut aperiam ipsam a saepe nesciunt qui rerum voluptatibus. </h5><p>Quo quae aspernatur eum dolores nobis <em>Sed alias et ipsam maxime vel error architecto</em>. Quo atque ipsa nam sequi faceresed quis? Ut dolores nesciunt At sunt distinctio <strong>Sit sint cum corporis itaque ut esse beatae eum totam laudantium</strong>. </p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user->id
        ]);

        $photo1 = PostPhoto::create([
            'file_name'=>"5462680.png",
            'file_path'=>"/5462680.1728232796992-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>36553,
            'post_id'=>$post1->id,
        ]);
        $post1->update(['thumbnail_id'=>$photo1->id]);
        $post1 = Post::create([
            'title'=>'Lorem ipsum dolor sit amet, consectetur dispising elit',
            'subtitle'=>'lorem ipsum dolor sit amet, consectetur dispising elit lorem ipsum dolor sit amet, consectetur dispising elit',
            'slug'=>'lorem-ipusm-dolor',
            'content'=> '<h1>Et adipisci nisi qui numquam voluptas sed neque omnis. </h1><p>Lorem ipsum dolor sit amet. Ut labore sunt <a href="https://www.loremipzum.com" target="_blank">Aut similique id distinctio molestiae ab enim cupiditate</a> aut molestiae odit ab sapiente facere. Et galisum soluta <em>Qui autem non voluptatum magnam non eaque sunt</em>. Eum rerum atque <strong>Et quia ut nobis necessitatibus sed dolorem dolores</strong>. Ad saepe facilis et modi molestiasvel quaerat et accusantium eius. </p><h2>Sit vero sunt in vitae illum. </h2><p>Aut debitis temporibus <em>Aut aliquam ut galisum dolorem</em>. Sed voluptatem iure sed quibusdam nostrumAut dolorem qui perferendis assumenda sed internos deserunt? </p><ul><li>Sed voluptatibus iusto cum repellat odit sit autem error et quos reprehenderit. </li><li>Eum reiciendis aperiam non quos dolor sed molestiae quis qui tempore quasi. </li><li>Est odit necessitatibus qui autem nihil quo iusto consequatur sed accusantium ipsa. </li><li>Et magni necessitatibus sit omnis dolorem sit provident quaerat? </li><li>Ea animi excepturi ut dolorem odio. </li><li>Hic quia corrupti aut corporis illum ut blanditiis repellendus. </li></ul><h3>Non nulla Quis vel repellat architecto et debitis consectetur! </h3><p>Aut adipisci corporis sed asperiores vitae <em>Ab quam et cumque fugit non ipsam voluptatum</em>. Vel delectus sequi in reiciendis similique <a href="https://www.loremipzum.com" target="_blank">33 unde nam fugiat rerum aut nostrum laudantium</a>? Cum ratione voluptatibus <strong>Sit doloribus in facilis neque aut officia corporis qui consequatur doloremque</strong> et ipsum voluptas qui necessitatibus veritatis. </p><h4>Eos molestias numquam sed galisum repellat aut beatae sapiente. </h4><p>Aut repudiandae consequatur <em>Ut sint rem accusantium laboriosam vel ducimus assumenda</em>. In consequuntur eligendi a deleniti esseaut fuga ad delectus officiis. </p><h5>Et expedita voluptas eos veritatis delectus. </h5><p>Vel culpa laboriosam et atque quianon nemo! Ut voluptatem tempore et atque doloret tenetur ut fugit sint. </p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user->id
        ]);

        $photo1 = PostPhoto::create([
            'file_name'=>"5462680.png",
            'file_path'=>"/5462680.1728232796993-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>36553,
            'post_id'=>$post1->id,
        ]);
        $post1->update(['thumbnail_id'=>$photo1->id]);

        $this->call([
            PermissionsSeeder::class,
            UserSeeder::class
        ]);

        // CollectionPoint::factory()->count(10)->create();
        
        // CollectionPoint::create([
        //     "name" => "Ecoponto Barão Geraldo", // Gera um nome de ponto de coleta
        //     "address" => "Av. Santa Isabel, 2300",
        //     "city" => "Campinas", // Seleciona uma cidade aleatória de SP
        //     "state" => 'São Paulo', // Define o estado como São Paulo
        //     "postal_code" =>"13084-012", // Gera um CEP válido para São Paulo
        //     "latitude" => "-22.81730190695577", // Limita a latitude ao estado de SP
        //     "longitude" => "-47.10042313868657", // Limita a longitude ao estado de SP
        //     "description" =>fake()->sentence(),
        // ]);
    }
}
