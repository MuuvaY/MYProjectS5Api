<?php

declare(strict_types=1); // strict mode

namespace App\Controller;

use App\Helper\HTTP;
use App\Model\Fighters;


class FightersController extends Controller
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
        $fighters = Fighters::getInstance()->findAll();
        echo json_encode($fighters);
    }

    public function show($id)
    {
        $id = (int) $id;
        $fighters = Fighters::getInstance()->find($id);
        echo json_encode($fighters);
    }

    public function create()
    {
        $fighters = Fighters::getInstance()->create([
            'name' => trim($_POST['name']),
            'nickname' => trim($_POST['nickname']),
            'age' => trim($_POST['age']),
            'weight_class' => trim($_POST['weight_class']),
            'record' => trim($_POST['record']),
            'nationality' => trim($_POST['nationality']),
            'team' => trim($_POST['team']),

        ]);
        echo json_encode($fighters);
    }

    public function update($id)
    {

        $json = file_get_contents("php://input");

        parse_str($json, $datas);

        if (isset($datas['name']) && isset($datas['nickname'])) {

            $datas['name'] = trim($datas['name']);
            $datas['nickname'] = trim($datas['nickname']);
            $datas['age'] = trim($datas['age']);
            $datas['weight_class'] = trim($datas['weight_class']);
            $datas['record'] = trim($datas['record']);
            $datas['nationality'] = trim($datas['nationality']);
            $datas['team'] = trim($datas['team']);

            $id = (int) $id;

            $update = Fighters::getInstance()->update($id, $datas);

            echo json_encode($update);
        } else {
            echo json_encode(['error' => 'Le name et le nick sont requis.']);
        }

    }

    public function delete($id)
    {
        $id = (int) $id;
        $fighters = Fighters::getInstance()->delete($id);
        echo json_encode($fighters);

    }
}

