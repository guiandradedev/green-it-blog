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
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionsSeeder::class,
            CollectionPointSeeder::class
        ]);

        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Guilherme Andrade',
            'email' => 'gui@teste.com',
            'about' => 'Estudante de Engenharia de Computação buscando aprender e implementar conceitos que melhorem a vida com a tecnologia.',
            'linkedin' => 'https://www.linkedin.com/in/guiandradedev/',
            'github' => 'https://github.com/guiandradedev',
            'username' => 'andrade',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);

        $user2 = User::create([
            'name' => 'Arnaldo',
            'email' => 'arnaldo@teste.com',
            'about' => 'Texto sobre do Arnaldo',
            'linkedin' => '',
            'github' => 'https://github.com/arnaldoflorenc',
            'username' => 'arnaldo',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user2->assignRole('author');

        $user3 = User::create([
            'name' => 'Ximenes',
            'email' => 'ximenes@teste.com',
            'about' => 'Texto sobre do Ximenes',
            'linkedin' => 'https://www.linkedin.com/in/guiximenes/',
            'github' => 'https://github.com/ximeninh0',
            'username' => 'ximenes',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user3->assignRole('admin');
        
        $user4 = User::create([
            'name' => 'Luigi Shima',
            'email' => 'luigishi@teste.com',
            'about' => 'Texto sobre do Luigi Shima',
            'linkedin' => '',
            'github' => 'https://github.com/luigishimabukuro',
            'username' => 'shima',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user4->assignRole('author');

        $user5 = User::create([
            'name' => 'Luigi Garutti',
            'email' => 'luigig@teste.com',
            'about' => 'Texto sobre do Luigi',
            'linkedin' => '',
            'github' => 'https://github.com/LuigiZanon',
            'username' => 'zanon',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user5->assignRole('dev');

        $user6 = User::create([
            'name' => 'Pedro Désio',
            'email' => 'pedro@teste.com',
            'about' => 'Texto sobre do Pedro',
            'linkedin' => '',
            'github' => '',
            'username' => 'pedro',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user6->assignRole('author');

        $user7 = User::create([
            'name' => 'Bruno Shimizu',
            'email' => 'bruno@teste.com',
            'about' => 'Texto sobre do Shimizu',
            'linkedin' => '',
            'github' => '',
            'username' => 'bruno',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user7->assignRole('author');
        
        $user8 = User::create([
            'name' => 'Rafael',
            'email' => 'rafa@teste.com',
            'about' => 'Texto sobre do Rafael',
            'linkedin' => 'https://www.linkedin.com/in/rafael-siscaro-826692333/',
            'github' => 'https://github.com/Rafa38gh',
            'username' => 'rafa',
            'avatar' => '/5462680.1728232796994-.png',
            'password'=>Hash::make('password')
        ]);
        $user8->assignRole('dev');

        $post1 = Post::create([
            'title'=>'Data Centers Sustentáveis',
            'subtitle'=>'Como data centers em climas frios reduzem os custos de energia',
            'slug'=>sanitize_string('Como data centers em climas frios reduzem os custos de energia'),
            'content'=> '<p>Com o aumento da demanda por processamento de dados, o consumo de energia tornou-se uma das principais preocupações para o futuro. A necessidade de construção de novos data centers para armazenar e processar dados traz consigo um desafio, como manter os servidores resfriados e economizar energia?</p><p>Para entender a resposta a essa pergunta, primeiro devemos compreender como o consumo de energia no mundo tem aumentado nos últimos anos, principalmente devido a chegada de novas tecnologias</p><p>&nbsp;</p><p><strong>A mudança no consumo de energia ao longo dos anos</strong></p><p>Em um estudo publicado pela Agência Internacional de Energia (IEA em inglês), haverá um crescimento de cerca de 4% no consumo global de energia em 2024, com chance de se manter da forma em 2025. A nível de comparação, esse aumento será a maior taxa de crescimento desde 2007.</p><p>O principal motivo do aumento exponencial apresentado está relacionado com a popularização da inteligência artificial (IA), que se incorporou ao mundo atual com exemplos conhecidos, como o ChatGPT.</p><p>Com a vinda da IA na sociedade moderna, a criação de novos data centers se torna uma necessidade crucial para o processamento dos dados necessários para que a tecnologia funcione. Porém, isso cria a necessidade de construir novos sistemas de refrigeração, para manter os servidores funcionando de maneira adequada.</p><p>Para termos uma noção do crescimento, segundo a IEA, até 2026, o aumento na demanda de data centers deve crescer até 3% em 2026, o que é menor que o crescimento do uso de veículos elétricos nesse mesmo período, 2%.</p><p>&nbsp;</p><p><strong>A sustentabilidade como um atrativo</strong></p><p>Para solucionar o problema da refrigeração, empresas como a Google, o Facebook e a Microsoft têm abordado a questão de maneira criativa, construindo data centers em regiões naturalmente frias.</p><p>Localizado a cerca de 70 milhas ao sul do Círculo Polar Ártico, em Luleå, na Suécia, o data center do Facebook utiliza a própria água fria proveniente do oceano para resfriar seus servidores, eliminando a necessidade de sistemas de refrigeradores mecânicos convencionais, que consomem muita energia. Segundo a própria empresa, a redução nos custos de construção do estabelecimento foi de quase 40%, pois não foi necessário incluir refrigeradores no processo.</p><p>Em média, a construção dessas instalações custa em torno de 15 milhões de dólares para cada megawatt de capacidade. O uso de refrigeração gratuita reduziu os custos em 40%.</p><p>&nbsp;</p><p>A escolha do território, porém, não se trata apenas do clima mais frio, mas também do uso de energia sustentável.</p><p>Regiões como a Suécia e a Islândia geram mais energia per capita do que qualquer outra. Devido ao uso de fontes de energia hidrelétrica e geotérmica elas são capazes de produzir energia sustentável a longo prazo, com poucas pessoas utilizando-as no momento. Portanto, há uma grande capacidade de atender a demanda elétrica de novos data centers, possibilitando que novas empresas construam suas instalações nas proximidades.</p><p>A sustentabilidade acaba sendo um grande atrativo, pois permite que empresas melhorem sua reputação ambiental e economizem um dinheiro considerável. O uso de energia sustentável contribui para uma grande redução nos custos e na emissão de carbono na atmosfera, permitindo que as novas tecnologias sejam utilizadas em conjunto com o meio ambiente</p><p>&nbsp;</p><p><strong>Referências Bibliográficas:</strong></p><p><a href="https://www.theregister.com/2016/05/12/power_in_a_cold_climate/"><strong>https://www.theregister.com/2016/05/12/power_in_a_cold_climate/</strong></a></p><p><a href="https://www.datacenterdynamics.com/en/news/solar-energy-could-power-data-centers-in-cold-climates-study/">https://www.datacenterdynamics.com/en/news/solar-energy-could-power-data-centers-in-cold-climates-study/</a></p><p><a href="https://netrality.com/data-centers/making-data-centers-cool/">https://netrality.com/data-centers/making-data-centers-cool/</a></p><p><a href="https://megawhat.energy/mercado-energetico/consumo/temperaturas-mais-altas-data-centers-e-precos-negativos-o-futuro-do-consumo-global-de-energia/">https://megawhat.energy/mercado-energetico/consumo/temperaturas-mais-altas-data-centers-e-precos-negativos-o-futuro-do-consumo-global-de-energia/</a></p><p>&nbsp;</p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user8->id
        ]);

        $photo1 = PostPhoto::create([
            'file_name'=>"data_center_facebook.jpeg.png",
            'file_path'=>"/data_center_facebook.172921706716-.jpeg",
            'file_extension'=>"jpeg",
            'mime_type'=>"image/jpeg",
            'file_size'=>180197,
            'post_id'=>$post1->id,
        ]);
        $post1->update(['thumbnail_id'=>$photo1->id]);

        $post2 = Post::create([
            'title'=>'TI Verde - Boas Práticas',
            'subtitle'=>'Soluções Sustentáveis em TI: Reduzindo Impactos Ambientais com Práticas Verdes',
            'slug'=>sanitize_string('Soluções Sustentáveis em TI: Reduzindo Impactos Ambientais com Práticas Verdes'),
            'content'=> '<p>Conjunto de práticas que tentam deixar o uso dos recursos da computação de maneira limpa e sustentável para o meio ambiente. Essas práticas consistem em maneiras ou métodos<br>para a redução da emissão de CO2, menos gasto de energia ou otimização do uso.</p><br><h2><strong>INFOGRÁFICO</strong></h2><ul><li>- O infográfico acima cita 5 maneiras que o TI verde pode ser desenvolvido. Sendo elas:</li><li>- A computação em nuvem, vem com a premissa de reduzir o uso de HDs e trabalhos presenciais na empresa, e por consequência diminuiria a quantidade de material gasto para a sua elaboração, energia e emissão de carbono com os processos.</li><li>- A melhor refrigeração dos Data Centers, que resultaria em um menor uso de energia, visto que a maior da energia gasta écom ar condicionado para manter a temperatura estável.</li><li>- A não utilização de materiais tóxicos durante a produção, tendo em vista o grande uso de metais e substâncias químicas, que podem ter o descarte de maneira incorreta, assim gerando impactos ambientais gravíssimos.</li><li>A evolução tecnológica com baixo impacto, a qual tem como o maior objetivo gerenciar a cadeia de produção nas indústrias, desde a extração da matéria prima até a entrega do produto final, prevendo que a emissão de gases do efeito estufa seja menor.</li><li>- A logística inversa, que tem o intuito de recuperar o lixo eletrônico e/ou não biodegradável, como o plástico, gerado pelos produtos, com isso, o descarte e a reciclagem podem ser feita de maneira correta, e diminuindo ainda mais a poluição.</li></ul>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user2->id
        ]);

        $photo2 = PostPhoto::create([
            'file_name'=>"infografico ecobyte.jpeg",
            'file_path'=>"/infografico-ecobyte.172921531957-.jpeg",
            'file_extension'=>"jpeg",
            'mime_type'=>"image/jpeg",
            'file_size'=>203598,
            'post_id'=>$post2->id,
        ]);
        $post2->update(['thumbnail_id'=>$photo2->id]);


        // $post1 = Post::create([
        //     'title'=>'Reducao do consumo de energia em data center',
        //     'subtitle'=>'lorem ipsum dolor sit amet, consectetur dispising elit',
        //     'slug'=>'reducao-do-consumo',
        //     'content'=> '<h1>33 porro minus qui iusto eaque et dolores cumque. </h1><p>Lorem ipsum dolor sit amet. Qui voluptas natusNon corrupti aut enim optio sit placeat amet. Aut mollitia quia <strong>A recusandae rem magnam soluta aut suscipit modi est alias sunt</strong> aut officiis nemo est nihil dolores. </p><ul><li>Aut labore dicta et quibusdam tenetur. </li><li>Vel quae libero est quae culpa. </li><li>Et aliquid consequatur qui ipsum dolorem aut voluptas omnis? </li><li>Eos quam fuga non quia officia ab possimus harum! </li></ul><h2>Nam harum exercitationem ut sint facilis. </h2><p>A dolores animi <a href="https://www.loremipzum.com" target="_blank">Aut illum et suscipit aspernatur est magni voluptatum</a> et harum odit. Et excepturi molestiae ab animi ipsamnam dolorem sed vero quia sit fugit voluptas. Non dolores deserunt ea neque illumnon quasi. Qui voluptatem nihilNam consequuntur id quidem eligendi est provident nihil qui modi nihil. </p><h3>Aut dolores veniam a fugit molestiae. </h3><p>Ut molestiae blanditiis <em>Et consectetur eum quia dolor vel debitis cupiditate</em> et galisum dicta et provident nisi. Sed ratione consequatur qui aperiam voluptas <strong>Aut nemo ab quos adipisci ea omnis reiciendis sit fuga dolores</strong>. </p><h4>Et galisum voluptate aut dolor ipsam eos Quis ipsum! </h4><p>Hic ullam voluptatum quo omnis itaque <a href="https://www.loremipzum.com" target="_blank">Qui animi nam accusamus consequatur aut voluptatem iure rem natus voluptatem</a>. Ut minus suscipit <strong>Eos quidem eos esse aspernatur et alias amet et dicta fugiat</strong> et dicta placeat in mollitia tenetur! Ut quod magni et nesciunt voluptas <em>33 quod aut repellat reprehenderit et beatae laborum ab velit pariatur</em>. Qui provident molestiasNon aliquam non corporis sint vel illo necessitatibus quo velit unde sit voluptate exercitationem. </p><h5>Ut aperiam ipsam a saepe nesciunt qui rerum voluptatibus. </h5><p>Quo quae aspernatur eum dolores nobis <em>Sed alias et ipsam maxime vel error architecto</em>. Quo atque ipsa nam sequi faceresed quis? Ut dolores nesciunt At sunt distinctio <strong>Sit sint cum corporis itaque ut esse beatae eum totam laudantium</strong>. </p>',
        //     'status'=> PostStatus::PUBLICADO,
        //     'author_id'=>$user->id
        // ]);

        // $photo1 = PostPhoto::create([
        //     'file_name'=>"5462680.png",
        //     'file_path'=>"/5462680.1728232796992-.png",
        //     'file_extension'=>"png",
        //     'mime_type'=>"image/png",
        //     'file_size'=>36553,
        //     'post_id'=>$post1->id,
        // ]);
        // $post1->update(['thumbnail_id'=>$photo1->id]);
        // $post1 = Post::create([
        //     'title'=>'Lorem ipsum dolor sit amet, consectetur dispising elit',
        //     'subtitle'=>'lorem ipsum dolor sit amet, consectetur dispising elit lorem ipsum dolor sit amet, consectetur dispising elit',
        //     'slug'=>'lorem-ipusm-dolor',
        //     'content'=> '<h1>Et adipisci nisi qui numquam voluptas sed neque omnis. </h1><p>Lorem ipsum dolor sit amet. Ut labore sunt <a href="https://www.loremipzum.com" target="_blank">Aut similique id distinctio molestiae ab enim cupiditate</a> aut molestiae odit ab sapiente facere. Et galisum soluta <em>Qui autem non voluptatum magnam non eaque sunt</em>. Eum rerum atque <strong>Et quia ut nobis necessitatibus sed dolorem dolores</strong>. Ad saepe facilis et modi molestiasvel quaerat et accusantium eius. </p><h2>Sit vero sunt in vitae illum. </h2><p>Aut debitis temporibus <em>Aut aliquam ut galisum dolorem</em>. Sed voluptatem iure sed quibusdam nostrumAut dolorem qui perferendis assumenda sed internos deserunt? </p><ul><li>Sed voluptatibus iusto cum repellat odit sit autem error et quos reprehenderit. </li><li>Eum reiciendis aperiam non quos dolor sed molestiae quis qui tempore quasi. </li><li>Est odit necessitatibus qui autem nihil quo iusto consequatur sed accusantium ipsa. </li><li>Et magni necessitatibus sit omnis dolorem sit provident quaerat? </li><li>Ea animi excepturi ut dolorem odio. </li><li>Hic quia corrupti aut corporis illum ut blanditiis repellendus. </li></ul><h3>Non nulla Quis vel repellat architecto et debitis consectetur! </h3><p>Aut adipisci corporis sed asperiores vitae <em>Ab quam et cumque fugit non ipsam voluptatum</em>. Vel delectus sequi in reiciendis similique <a href="https://www.loremipzum.com" target="_blank">33 unde nam fugiat rerum aut nostrum laudantium</a>? Cum ratione voluptatibus <strong>Sit doloribus in facilis neque aut officia corporis qui consequatur doloremque</strong> et ipsum voluptas qui necessitatibus veritatis. </p><h4>Eos molestias numquam sed galisum repellat aut beatae sapiente. </h4><p>Aut repudiandae consequatur <em>Ut sint rem accusantium laboriosam vel ducimus assumenda</em>. In consequuntur eligendi a deleniti esseaut fuga ad delectus officiis. </p><h5>Et expedita voluptas eos veritatis delectus. </h5><p>Vel culpa laboriosam et atque quianon nemo! Ut voluptatem tempore et atque doloret tenetur ut fugit sint. </p>',
        //     'status'=> PostStatus::PUBLICADO,
        //     'author_id'=>$user->id
        // ]);

        // $photo1 = PostPhoto::create([
        //     'file_name'=>"5462680.png",
        //     'file_path'=>"/5462680.1728232796993-.png",
        //     'file_extension'=>"png",
        //     'mime_type'=>"image/png",
        //     'file_size'=>36553,
        //     'post_id'=>$post1->id,
        // ]);
        // $post1->update(['thumbnail_id'=>$photo1->id]);


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
