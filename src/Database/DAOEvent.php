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

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
    }

    public function getEvent($eventId)
    {
        // TODO: Implement getEvent() method.
    }

    public function getListEvents($id)
    {
        // TODO: Implement getListEvents() method.
    }

    public function add(Event $event)
    {
        // TODO Validate event

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