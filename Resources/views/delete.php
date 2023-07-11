<?php
$contactID = $_GET['id'];
$contactController = new $contactController();
$contactController->deleteContact($contactID);