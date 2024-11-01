<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\CollectionPoint;
use App\Models\Post;
use App\Models\PostPhoto;
use App\Models\References;
use App\Models\User;
use App\Models\UserPhoto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Reference\Reference;

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
        $user->assignRole('admin');


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
            'content'=> '<p>Com o aumento da demanda por processamento de dados, o consumo de energia tornou-se uma das principais preocupações para o futuro. A necessidade de construção de novos data centers para armazenar e processar dados traz consigo um desafio, como manter os servidores resfriados e economizar energia?</p><p>Para entender a resposta a essa pergunta, primeiro devemos compreender como o consumo de energia no mundo tem aumentado nos últimos anos, principalmente devido a chegada de novas tecnologias</p><p>&nbsp;</p><p><strong>A mudança no consumo de energia ao longo dos anos</strong></p><p>Em um estudo publicado pela Agência Internacional de Energia (IEA em inglês), haverá um crescimento de cerca de 4% no consumo global de energia em 2024, com chance de se manter da forma em 2025. A nível de comparação, esse aumento será a maior taxa de crescimento desde 2007.</p><p>O principal motivo do aumento exponencial apresentado está relacionado com a popularização da inteligência artificial (IA), que se incorporou ao mundo atual com exemplos conhecidos, como o ChatGPT.</p><p>Com a vinda da IA na sociedade moderna, a criação de novos data centers se torna uma necessidade crucial para o processamento dos dados necessários para que a tecnologia funcione. Porém, isso cria a necessidade de construir novos sistemas de refrigeração, para manter os servidores funcionando de maneira adequada.</p><p>Para termos uma noção do crescimento, segundo a IEA, até 2026, o aumento na demanda de data centers deve crescer até 3% em 2026, o que é menor que o crescimento do uso de veículos elétricos nesse mesmo período, 2%.</p><p>&nbsp;</p><p><strong>A sustentabilidade como um atrativo</strong></p><p>Para solucionar o problema da refrigeração, empresas como a Google, o Facebook e a Microsoft têm abordado a questão de maneira criativa, construindo data centers em regiões naturalmente frias.</p><p>Localizado a cerca de 70 milhas ao sul do Círculo Polar Ártico, em Luleå, na Suécia, o data center do Facebook utiliza a própria água fria proveniente do oceano para resfriar seus servidores, eliminando a necessidade de sistemas de refrigeradores mecânicos convencionais, que consomem muita energia. Segundo a própria empresa, a redução nos custos de construção do estabelecimento foi de quase 40%, pois não foi necessário incluir refrigeradores no processo.</p><p>Em média, a construção dessas instalações custa em torno de 15 milhões de dólares para cada megawatt de capacidade. O uso de refrigeração gratuita reduziu os custos em 40%.</p><p>&nbsp;</p><p>A escolha do território, porém, não se trata apenas do clima mais frio, mas também do uso de energia sustentável.</p><p>Regiões como a Suécia e a Islândia geram mais energia per capita do que qualquer outra. Devido ao uso de fontes de energia hidrelétrica e geotérmica elas são capazes de produzir energia sustentável a longo prazo, com poucas pessoas utilizando-as no momento. Portanto, há uma grande capacidade de atender a demanda elétrica de novos data centers, possibilitando que novas empresas construam suas instalações nas proximidades.</p><p>A sustentabilidade acaba sendo um grande atrativo, pois permite que empresas melhorem sua reputação ambiental e economizem um dinheiro considerável. O uso de energia sustentável contribui para uma grande redução nos custos e na emissão de carbono na atmosfera, permitindo que as novas tecnologias sejam utilizadas em conjunto com o meio ambiente</p></p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user8->id
        ]);

        $photo1 = PostPhoto::create([
            'file_name'=>"infografico datacenter.jpeg",
            'file_path'=>"/infografico-datacenter.173042530110-.jpeg",
            'file_extension'=>"jpeg",
            'mime_type'=>"image/jpeg",
            'file_size'=>208392,
            'post_id'=>$post1->id,
        ]);
        // $photo1 = PostPhoto::create([
        //     'file_name'=>"infografico datacenter.jpeg",
        //     'file_path'=>"/data_center_facebook.172921706716-.jpeg",
        //     'file_extension'=>"jpeg",
        //     'mime_type'=>"image/jpeg",
        //     'file_size'=>180197,
        //     'post_id'=>$post1->id,
        // ]);
        $post1->update(['thumbnail_id'=>$photo1->id]);
        References::create([
            "link" => "https://www.theregister.com/2016/05/12/power_in_a_cold_climate/",
            "accessed_at" => "2025-10-18",
            "reference" => "BRADBURY, D. Super cool: Arctic data centres aren’t just for Facebook. Disponível em: <https://www.theregister.com/2016/05/12/power_in_a_cold_climate>. Acesso em: 18 de out. de 2024.",
            "post_id" => $post1->id,
        ]);
        
        References::create([
            "link" => "https://www.datacenterdynamics.com/en/news/solar-energy-could-power-data-centers-in-cold-climates-study/",
            "accessed_at" => "2025-10-18",
            "reference" => "Solar energy could power data centers in cold climates - study. Disponível em: <https://www.datacenterdynamics.com/en/news/solar-energy-could-power-data-centers-in-cold-climates-study/>. Acesso em: 18 de out. de 2024.",
            "post_id" => $post1->id,
        ]);
        
        References::create([
            "link" => "https://netrality.com/data-centers/making-data-centers-cool/",
            "accessed_at" => "2025-10-18",
            "reference" => "MLEE. Making Data Centers Cool. Disponível em: <https://netrality.com/data-centers/making-data-centers-cool/>. Acesso em: 18 de out. de 2024.",
            "post_id" => $post1->id,
        ]);
        
        References::create([
            "link" => "https://megawhat.energy/mercado-energetico/consumo/temperaturas-mais-altas-data-centers-e-precos-negativos-o-futuro-do-consumo-global-de-energia/",
            "accessed_at" => "2025-10-18",
            "reference" => "SOUTO, P. Temperaturas mais altas, data centers e preços negativos: o futuro do consumo global de energia - MegaWhat. Disponível em: <https://megawhat.energy/mercado-energetico/consumo/temperaturas-mais-altas-data-centers-e-precos-negativos-o-futuro-do-consumo-global-de-energia>. Acesso em: 118 de out. de 2024.",
            "post_id" => $post1->id,
        ]);
        
        $post2 = Post::create([
            'title'=>'TI Verde e suas tendências',
            'subtitle'=>'Soluções Sustentáveis em TI: Reduzindo Impactos Ambientais com Práticas Verdes',
            'slug'=>sanitize_string('Soluções Sustentáveis em TI: Reduzindo Impactos Ambientais com Práticas Verdes'),
            'content'=> '<p>Conjunto de práticas que tentam deixar o uso dos recursos da computação de maneira limpa e sustentável para o meio ambiente. Essas práticas consistem em maneiras ou métodos<br>para a redução da emissão de CO2, menos gasto de energia ou otimização do uso.</p><br><h2><strong>INFOGRÁFICO</strong></h2><ul><li>- O infográfico acima cita 5 maneiras que o TI verde pode ser desenvolvido. Sendo elas:</li><li>- A computação em nuvem, vem com a premissa de reduzir o uso de HDs e trabalhos presenciais na empresa, e por consequência diminuiria a quantidade de material gasto para a sua elaboração, energia e emissão de carbono com os processos.</li><li>- A melhor refrigeração dos Data Centers, que resultaria em um menor uso de energia, visto que a maior da energia gasta écom ar condicionado para manter a temperatura estável.</li><li>- A não utilização de materiais tóxicos durante a produção, tendo em vista o grande uso de metais e substâncias químicas, que podem ter o descarte de maneira incorreta, assim gerando impactos ambientais gravíssimos.</li><li>A evolução tecnológica com baixo impacto, a qual tem como o maior objetivo gerenciar a cadeia de produção nas indústrias, desde a extração da matéria prima até a entrega do produto final, prevendo que a emissão de gases do efeito estufa seja menor.</li><li>- A logística inversa, que tem o intuito de recuperar o lixo eletrônico e/ou não biodegradável, como o plástico, gerado pelos produtos, com isso, o descarte e a reciclagem podem ser feita de maneira correta, e diminuindo ainda mais a poluição.</li></ul>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user2->id
        ]);

        $photo2 = PostPhoto::create([
            'file_name'=>"infografico ti-verde.png",
            'file_path'=>"/infografico-ti-verde.173046052918-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>1230322,
            'post_id'=>$post2->id,
        ]);
        $post2->update(['thumbnail_id'=>$photo2->id]);
        References::create([
            "link"=>"https://circularbrain.io/descomplicando-a-logistica-reversa-de-eletroeletronicos",
            "accessed_at"=>"2024-10-31",
            "reference"=>"Circular Brain. ([s.d.]). Descomplicando a Logística Reversa de Eletroeletrônicos. Circularbrain.io. Recuperado 29 de novembro de 2024, de https://circularbrain.io/descomplicando-a-logistica-reversa-de-eletroeletronicos/",
            "post_id"=>$post2->id,
        ]);
        References::create([
            "link"=>"https://greeneletron.org.br/blog/green-eletron-reciclou-mais-de-514-toneladas-de-lixo-eletronico-em-2019-confira-outras-conquistas/",
            "accessed_at"=>"2024-10-31",
            "reference"=>"Eletron, G. (2019, dezembro 19). Green Eletron reciclou mais de 514 toneladas de lixo eletrônico em 2019. Confira outras conquistas! -. Org.br. https://greeneletron.org.br/blog/green-eletron-reciclou-mais-de-514-toneladas-de-lixo-eletronico-em-2019-confira-outras-conquistas/",
            "post_id"=>$post2->id,
        ]);

        $post3 = Post::create([
            'title'=>'Logística Reversa: Responsabilidade Ambiental e Descarte Correto de Resíduos',
            'subtitle'=>'Entenda como o gerenciamento de resíduos eletrônicos, hospitalares e outros materiais de risco contribui para a sustentabilidade e a saúde pública, e conheça os locais e métodos para o descarte adequado',
            'slug'=>sanitize_string('logística reversa'),
            'content'=> '<p>A logística reversa é um instrumento que se da por um conjunto de ações, visando garantir um reinserção do resíduo na cadeia produtiva e/ou dar um destinação correta para esse lixo. Pode-se citar como exemplo o lixo eletrônico que caso não haja a destinação correta, pode gerar contaminação do solo e água, incêndios e outros danos a saúde pública. No Brasil é tratada pela lei de número 12.305 de 2010, a qual deixa o manejo adequado desse tipo de resíduo com as empresas que os produzem.</p><ul><li>-Resíduos que se enquadram: Lixos hospitalares, remédios e suas embalagens, aparelhos eletrônicos e eletrodomésticos, lâmpadas, pilhas e baterias, produtos automotivos (óleos, lubrificantes, baterias, pneus), embalagens de aço e alumínio, e insumos agrícolas;</li><li>-Locais para Descarte: Esse tipo de lixo, são considerados classificados como um alto risco a saúde e com grande impacto ambiental, então necessitam de um descarte correto que pode ser feito nos Ecopontos de cada cidade, nas devolutiva para as empresas, lojas e assistências técnicas, ou em outros postos de coleta especializada.</li><li>-Benefícios: Garante uma destinação correta para esse lixo, evitando maiores danos ambientais. Responsabiliza todos (setor publico/privado, consumidores) na hora do descarte correto. Aumenta a reutilização de materiais.<br>&nbsp;</li></ul>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user3->id
        ]);

        $photo3 = PostPhoto::create([
            'file_name'=>"infográfico - Logística Reversa.png",
            'file_path'=>"/infográfico---logística-reversa.173042497719-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>378545,
            'post_id'=>$post3->id,
        ]);
        $post3->update(['thumbnail_id'=>$photo3->id]);
        References::create([
            "link"=>"https://www.gov.br/mma/pt-br/assuntos/qualidade-ambiental-e-meio-ambiente-urbano/logistica-reversa#:~:text=A%20Logística%20Reversa%20é%20um,ciclos%20produtivos%2C%20ou%20outra%20destinação",
            "accessed_at"=>"2024-10-29",
            "reference"=>"-MMA, Inistério Do Meio Ambiente E Mudança Do Clima. Logística Reversa. gov.br, 2024. Disponível em: https://www.gov.br/mma/pt-br/assuntos/qualidade-ambiental-e-meio-ambiente-urbano/logistica-reversa#:~:text=A%20Logística%20Reversa%20é%20um,ciclos%20produtivos%2C%20ou%20outra%20destinação. Acesso em: 29 out. 2024. ",
            "post_id"=>$post3->id,
        ]);
        References::create([
            "link"=>"https://sinir.gov.br/perfis/logistica-reversa/logistica-reversa",
            "accessed_at"=>"2024-10-29",
            "reference"=>"-SNIR+, Sistema Nacional De Informações Sobre A Gestão Dos Resíduos Sólidos . O que é Logística Reversa. Ministério do Meio Ambiente, 2024. Disponível em: https://sinir.gov.br/perfis/logistica-reversa/logistica-reversa/. Acesso em: 29 out. 2024. ",
            "post_id"=>$post3->id,
        ]);


        $post4 = Post::create([
            'title'=>'O que é cloud computing?',
            'subtitle'=>'Computação em nuvem: benefícios, exemplos e impacto ambiental',
            'slug'=>sanitize_string('O que e cloud computing'),
            'content'=> '<h2><strong>O que é cloud computing?</strong></h2><p>É o fornecimento de serviços de computação, como servidores, armazenamento, banco de dados, rede, software, pela internet ("a nuvem"). Isso permite que empresas e indivíduos acessem e utilizem recursos tecnológicos sob demanda, sem a necessidade de investir em uma infraestrutura física própria.</p><p>&nbsp;</p><p>Quais são as principais vantagens?</p><ul><li>&nbsp;-Redução de custos: Elimina a necessidade de investimentos significativos em hardware e software, permitindo que os usuários paguem apenas pelos recursos que utilizam.</li><li>-Escalabilidade e flexibilidade: Permite ajustar rapidamente a capacidade de armazenamento e processamento conforme a demanda, sem a necessidade de adquirir ou instalar novos equipamentos.</li><li>-Atualizações automáticas: Os provedores de serviços em nuvem frequentemente atualizam seus sistemas, garantindo que os usuários tenham acesso às versões mais recentes sem esforço adicional.</li><li>-Eficiência Energética: A migração para a nuvem reduz a necessidade de manter servidores físicos locais, diminuindo o consumo de energia e, consequentemente, a pegada de carbono das empresas. Estudos indicam que a computação em nuvem pode reduzir o consumo de energia e a pegada de carbono em até 90%.</li></ul><p>&nbsp;</p><p>Alguns exemplos:</p><p>Google Cloud: O Google Cloud é alimentado por 100% de energia renovável, reduzindo a pegada de carbono dos serviços que utiliza. A infraestrutura do Google Cloud é projetada para otimizar o uso de energia e oferecer eficiência, contribuindo para práticas de TI Verde.</p><p>Amazon Web Services (AWS): A AWS tem iniciativas para reduzir a emissão de carbono em seus data centers, como o uso de energias renováveis e o investimento em projetos sustentáveis. Além disso, ao centralizar os recursos em nuvem, a AWS ajuda as empresas a reduzir o consumo de energia que teriam com servidores locais.</p><p>Microsoft Azure: A Microsoft tem metas ambiciosas de neutralidade em carbono e sustentabilidade. Seu serviço de nuvem, Azure, é alimentado por energias renováveis e busca melhorar a eficiência energética, reduzindo o impacto ambiental das operações.</p><p>Salesforce: A Salesforce implementa práticas de TI Verde ao utilizar a infraestrutura de nuvem de maneira eficiente, minimizando o consumo de energia de seus data centers. Eles também monitoram e relatam suas emissões de carbono para transparência e melhorias contínuas.</p><p>IBM Cloud: A IBM investe em tecnologia sustentável, com data centers que são otimizados para eficiência energética. Seus esforços incluem o uso de inteligência artificial para prever demandas e otimizar o uso de energia, reduzindo o impacto ambiental de sua operação em nuvem.&nbsp;<br>&nbsp;</p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user5->id
        ]);

        $photo4 = PostPhoto::create([
            'file_name'=>"cloud_computing.jpg",
            'file_path'=>"/cloud_computing.173042473052-.jpg",
            'file_extension'=>"jpeg",
            'mime_type'=>"image/jpeg",
            'file_size'=>178580,
            'post_id'=>$post4->id,
        ]);
        $post4->update(['thumbnail_id'=>$photo4->id]);
        References::create([
            "link"=>"https://www.iberdrola.com/sustentabilidade/que-e-lixo-eletronico",
            "accessed_at"=>"2024-10-29",
            "reference"=>"A poluição tecnológica, um problema do século XXI. Disponível em: <https://www.iberdrola.com/sustentabilidade/que-e-lixo-eletronico>. Acesso em: 1 nov. 2024.",
            "post_id"=>$post4->id,
        ]);
        References::create([
            "link"=>"https://circularbrain.io/descomplicando-a-logistica-reversa-de-eletroeletronicos",
            "accessed_at"=>"2024-11-01",
            "reference"=>"CIRCULAR BRAIN. Descomplicando a Logística Reversa de Eletroeletrônicos. Disponível em: <https://circularbrain.io/descomplicando-a-logistica-reversa-de-eletroeletronicos/>. Acesso em: 1 nov. 2024.",
            "post_id"=>$post4->id,
        ]);
        References::create([
            "link"=>"https://greeneletron.org.br/blog/green-eletron-reciclou-mais-de-514-toneladas-de-lixo-eletronico-em-2019-confira-outras-conquistas",
            "accessed_at"=>"2024-11-01",
            "reference"=>"ELETRON, G. Green Eletron reciclou mais de 514 toneladas de lixo eletrônico em 2019. Confira outras conquistas! -. Disponível em: <https://greeneletron.org.br/blog/green-eletron-reciclou-mais-de-514-toneladas-de-lixo-eletronico-em-2019-confira-outras-conquistas/>. Acesso em: 1 nov. 2024.",
            "post_id"=>$post4->id,
        ]);

        
        $post5 = Post::create([
            'title'=>'GreenIT vs TI Tradicional',
            'subtitle'=>'Um comparativo ilustrado',
            'slug'=>sanitize_string('GreenIT vs TI Tradicional'),
            'content'=> '<p>O infográfico acima ressalta as qualidades da GreenIT em relação ao modelo tradicional de Tecnologia da Informação. Com a análise demonstrada, pode ser observado diversos benefícios em seguir a TIVerde, desde financeiros até ambientais. Algo também não mencionado no infográfico seria a imagem da empresa que adota a metodologia do GreenIT, visto que investidores, stackholders e consumidores estão cada vez mais atentos a práticas sustentáveis dessas empresas de tecnologia.<br><a href="https://conteudo.movidesk.com/o-que-e-green-it/#:~:text=Uma%20das%20premissas%20do%20Green,atmosfera%20e%20poluem%20as%20cidades">https://conteudo.movidesk.com/o-que-e-green-it/#:~:text=Uma%20das%20premissas%20do%20Green,atmosfera%20e%20poluem%20as%20cidades</a></p><p><br></p><p>&nbsp;</p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user3->id
        ]);

        $photo5 = PostPhoto::create([
            'file_name'=>"infografico2.png",
            'file_path'=>"/infografico2.173042503664-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/jpeg",
            'file_size'=>204786,
            'post_id'=>$post5->id,
        ]);
        References::create([
            "link"=>"https://www.grupomytec.com.br/blog/green-it-entenda-importancia-da-tecnologia-sustentavel",
            "accessed_at"=>"2024-10-30",
            "reference"=>"GRUPO MYTEC. Green IT: entenda a importância da tecnologia sustentável. Disponível em: https://www.grupomytec.com.br/blog/green-it-entenda-importancia-da-tecnologia-sustentavel. Acesso em: 31 out. 2024.",
            "post_id"=>$post5->id,
        ]);
        References::create([
            "link"=>"https://conteudo.movidesk.com/o-que-e-green-it/#:~:text=Uma%20das%20premissas%20do%20Green,atmosfera%20e%20poluem%20as%20cidades",
            "accessed_at"=>"2024-10-30",
            "reference"=>"MOVIDESK. Green IT: o que é, como aplicar e exemplos de boas práticas. Disponível em: https://conteudo.movidesk.com/o-que-e-green-it/. Acesso em: 31 out. 2024.",
            "post_id"=>$post5->id,
        ]);
        $post5->update(['thumbnail_id'=>$photo5->id]);
 
        $post6 = Post::create([
            'title'=>'GreenIT na sua Empresa',
            'subtitle'=>'Aplicando a GreenIT na sua empresa',
            'slug'=>sanitize_string('greenit-na-sua-empresa'),
            'content'=>'<p>Pensando nas boas práticas do GreenIT, foi feito uma pesquisa sobre a implementação dela no meio empresarial, prezando a sustentabilidade e a eficiência operacional. Tendo o alinhamento das evoluções tecnológicas com a responsabilidade ambiental, as empresas conseguem reduzir o uso de carbono e com isso obter diversos benefícios com os tópicos ditos no infográfico.</p>',
            'status'=> PostStatus::PUBLICADO,
            'author_id'=>$user7->id
        ]);

        $photo6 = PostPhoto::create([
            'file_name'=>"infografico pedro e shimizu.png",
            'file_path'=>"/infografico-pedro-e-shimizu.173042598564-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/jpeg",
            'file_size'=>272163,
            'post_id'=>$post6->id,
        ]);
        References::create([
            "link"=>"https://tiflux.com/blog/ti-verde/",
            "accessed_at"=>"2024-10-31",
            "reference"=>"TIFLUX. TI verde: o que é, exemplos, benefícios e como implementar. Disponível em: https://tiflux.com/blog/ti-verde/. Acesso em: 31 out. 2024.",
            "post_id"=>$post6->id,
        ]);
        $post6->update(['thumbnail_id'=>$photo6->id]);
 
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
