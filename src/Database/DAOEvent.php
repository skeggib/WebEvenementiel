<?php
/**
 * Created by PhpStorm.
 * User: SK250623
 * Date: 16/05/2017
 * Time: 16:15
 */

namespace WebEvents\Database;

use WebEvents\Models\Event;

class DAOEvent implements IDAOEvent
{
    private $database;
    private $daoUser;
    private $daoAddress;

    public function __construct(IDatabase $database,
                                IDAOUser $daoUser,
                                IDAOAddress $daoAddress)
    {
        $this->database = $database;
        $this->daoUser = $daoUser;
        $this->daoAddress = $daoAddress;
    }

    public function get($eventId)
    {
        if (!isset($eventId))
            return false;
        if (!is_numeric($eventId))
            return false;

        $results = $this->database->query("SELECT * FROM evenement WHERE id_evenement = " . $eventId);

        if ($results->rowCount() < 1)
            return false;

        $row = $results->fetch();

        $begin = $row['date_debut_evenement'];
        $beginArray = explode(" ", $begin);
        $end = $row['date_fin_evenement'];
        $endArray = explode(" ", $begin);

        $address = $this->daoAddress->get($row['id_lieu']);
        if (!$address)
            return false;

        $user = $this->daoUser->get($row['id_organisateur']);
        if (!$user)
            return false;

        $event = new Event(
            $row['id_evenement'],
            $row['nom_evenement'],
            $beginArray[0],
            $endArray[0],
            $beginArray[1],
            $endArray[1],
            $address,
            $row['commentaire_evenement'],
            $row['actif_evenement'],
            $user
        );

        return $event;
    }

    public function getListEvents($userId)
    {
        if (!isset($userId))
            return false;
        if (!is_numeric($userId))
            return false;

        $user = $this->daoUser->get($userId);
        if (!$user)
            return false;

        $results = $this->database->query("SELECT * FROM evenement WHERE id_organisateur = " . $userId);

        if ($results->rowCount() < 1)
            return false;

        $list = array();
        while ($row = $results->fetch())
        {
            $address = $this->daoAddress->get($row['id_lieu']);
            if (!$address)
                return false;

            $begin = $row['date_debut_evenement'];
            $beginArray = explode(" ", $begin);
            $end = $row['date_fin_evenement'];
            $endArray = explode(" ", $begin);

            $event = new Event(
                $row['id_evenement'],
                $row['nom_evenement'],
                $beginArray[0],
                $endArray[0],
                $beginArray[1],
                $endArray[1],
                $address,
                $row['commentaire_evenement'],
                $row['actif_evenement'],
                $user
            );

            array_push($list, $event);
        }

        return $list;
    }

    public function add(Event $event)
    {
        $queryResult = $this->database->query(
            "INSERT INTO evenement(" .
            "nom_evenement, " .
            "id_organisateur, " .
            "date_debut_evenement, " .
            "date_fin_evenement, " .
            "id_lieu, " .
            "actif_evenement, " .
            "commentaire_evenement) " .
            "VALUES(" .
            "'" . $event->getName() . "', " .
            "'" . $event->getOrganizer()->getId() . "', " .
            "'" . $event->getBeginDate() . " " . $event->getBeginTime() . "', " .
            "'" . $event->getEndDate() . " " . $event->getEndTime() . "', " .
            "'" . $event->getAddress()->getId() . "', " .
            "'" . $event->getActive() . "', " .
            "'" . $event->getDescription() . "');"
        );

        if (!$queryResult)
            return false;

        $event->setId($this->database->insertId());
        return $event;
    }
}