<?php

declare(strict_types=1); // strict mode

namespace App\Controller;

use App\Helper\HTTP;
use App\Model\Fights;


class FightsController extends Controller
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
        $fights = Fights::getInstance()->findAll();
        echo json_encode($fights);
    }

    public function show($id)
    {
        $id = (int) $id;
        $fights = Fights::getInstance()->find($id);
        echo json_encode($fights);
    }

    public function create()
    {
        $fights = Fights::getInstance()->create([
            'fighter1_id' => trim($_POST['fighter1_id']),
            'fighter2_id' => trim($_POST['fighter2_id']),
            'event_name' => trim($_POST['event_name']),
            'date' => trim($_POST['date']),
            'winner_id' => trim($_POST['winner_id']),
            'method' => trim($_POST['method']),
        ]);
        echo json_encode($fights);
    }

    public function update($id)
    {

        $json = file_get_contents("php://input");

        parse_str($json, $datas);

        if (isset($datas['fighter1_id']) && isset($datas['fighter2_id'])) {
            $datas['fighter1_id'] = trim($datas['fighter1_id']);
            $datas['fighter2_id'] = trim($datas['fighter2_id']);
            $datas['event_name'] = trim($datas['event_name']);
            $datas['date'] = trim($datas['date']);
            $datas['winner_id'] = trim($datas['winner_id']);
            $datas['method'] = trim($datas['method']);

            $id = (int) $id;

            $update = Fights::getInstance()->update($id, $datas);

            echo json_encode($update);
        } else {
            echo json_encode(['error' => 'Le titre et le corps sont requis.']);
        }

    }

    public function delete($id)
    {
        $id = (int) $id;
        $fights = Fights::getInstance()->delete($id);
        echo json_encode($fights);

    }
}
