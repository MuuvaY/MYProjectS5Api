<?php

declare(strict_types=1); // strict mode

namespace App\Controller;

use App\Helper\HTTP;
use App\Model\Post;


class PostController extends Controller
{

    public function option()
    {
        // CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods:  GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');
    }
    public function index()
    {
        $this->option();
        // récupérer les informations sur les posts
        $posts = Post::getInstance()->findAll();
        echo json_encode($posts);
    }

    public function show($id)
    {
        $id = (int) $id;
        $posts = Post::getInstance()->find($id);
        echo json_encode($posts);
    }

    public function create()
    {
        $posts = Post::getInstance()->create([
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => 1,
        ]);
        echo json_encode($posts);
    }

    public function update($id)
    {

        // Récupérer les données JSON du corps de la requête
        $json = file_get_contents("php://input");

        // Analyse la chaîne de requête en un tableau associatif
        parse_str($json, $datas);

        // Vérifiez si title et body sont présents dans les données
        if (isset($datas['title']) && isset($datas['body'])) {

            $datas['title'] = trim($datas['title']);
            $datas['body'] = trim($datas['body']);
            $datas['user_id'] = 1;

            $id = (int) $id;

            $update = Post::getInstance()->update($id, $datas);

            echo json_encode($update);
        } else {
            echo json_encode(['error' => 'Le titre et le corps sont requis.']);
        }

    }

    public function delete($id)
    {
        $id = (int) $id;
        $posts = Post::getInstance()->delete($id);
        echo json_encode($posts);

    }
}