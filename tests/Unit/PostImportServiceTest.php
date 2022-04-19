<?php

namespace Tests\Unit;

use App\Jobs\PostImport;
use App\Services\PostsImport;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class PostImportServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_post_imports_service()
    {


        $resp = [
            "data" => [
                [
                    "title" => "Quis cumque ipsa rerum molestiae quia velit sapiente exercitationem ut.",
                    "description" => "Dolorem nesciunt consequatur nobis ut aliquid exercitationem necessitatibus sed quia. Atque et nobis provident voluptas cum. Incidunt voluptatem nihil et perspiciatis ab ut quos. Eos consequuntur sequi accusantium. Necessitatibus ut dolores consequuntur.",
                    "publication_date" => "2022-04-19 02:18:44"
                ],
                [
                    "title" => "Ipsa et non ea rerum.",
                    "description" => "Inventore corrupti laboriosam aliquid sit alias. Quibusdam enim ut doloremque ipsa dicta dicta ex dolores. Aspernatur non sed magni sed sequi velit ad.",
                    "publication_date" => "2022-04-18 20:12:23"
                ],
                [
                    "title" => "Deleniti autem molestiae.",
                    "description" => "Aut sequi sed asperiores veniam labore. Rerum placeat eos. Veniam ab nisi quibusdam possimus sed.",
                    "publication_date" => "2022-04-19 06:19:11"
                ],
                [
                    "title" => "Odio molestiae accusantium.",
                    "description" => "Enim impedit quidem aut ex aut deleniti. Rerum sint doloremque rerum perspiciatis non omnis aut omnis nemo. Ullam aut consequatur. Quia alias molestiae non dolores consequuntur. Qui reprehenderit quibusdam ut qui atque deserunt. Amet corporis est.",
                    "publication_date" => "2022-04-18 22:47:42"
                ],
                [
                    "title" => "Iure consequuntur maiores quo cum inventore alias perspiciatis numquam.",
                    "description" => "Odio aut ipsam fugit modi consequatur necessitatibus. Rerum aut nobis voluptatibus sed cupiditate tempora nisi ipsam deserunt. Et excepturi et voluptates aut nobis iusto culpa aut repellat. At et sint blanditiis a qui architecto nihil accusamus ad.",
                    "publication_date" => "2022-04-19 11:40:33"
                ]
            ]
        ];


        Http::fake([
            config('settings.posts-import-url') => Http::response($resp, 200, ['Headers']),
        ]);
        Queue::fake();

        PostsImport::init()->handleImports();

        Queue::assertPushed(PostImport::class, 5);
    }
}
