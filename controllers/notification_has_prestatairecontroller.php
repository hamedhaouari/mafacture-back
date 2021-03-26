<?php

require_once(__DIR__ ."/../dao/notification_has_prestatairedao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class Notification_has_prestataireController extends Authentification{
 /**
     * @OA\Get(
     *     path="/notification_has_prestataire",
     *     tags={"notification_has_prestataire"},
     *     summary="Find notification_has_prestataire by ID",
     *     description="Returns a single notification_has_prestataire",
     *     operationId="getnotification_has_prestataireById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of notification_has_prestataire to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Notification_has_prestataire"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="notification_has_prestataire not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $notification_has_prestataire = new Notification_has_prestataireDao(null);
      $id = $_GET["id"];
      return $notification_has_prestataire->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/notification_has_prestataires",
     *   tags={"notification_has_prestataire"},
	 *   summary="list notification_has_prestataires",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with notification_has_prestataires"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $notification_has_prestataire = new Notification_has_prestataireDao(null);
      return $notification_has_prestataire->getall();
    }
	  /**
     * Add a new notification_has_prestataire 
     * 
     * @OA\Post(
     *     path="/notification_has_prestataire",
     *     tags={"notification_has_prestataire"},
     *     operationId="addNotification_has_prestataire",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Notification_has_prestataire")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $notification_has_prestataire = new Notification_has_prestataireDao($data);
      return $notification_has_prestataire->create($data);
    }
	  /**
     * Edit an existing notification_has_prestataire 
     * 
     * @OA\Patch(
     *     path="/notification_has_prestataire",
     *     tags={"notification_has_prestataire"},
     *     operationId="editNotification_has_prestataire",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Notification_has_prestataire")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $notification_has_prestataire = new Notification_has_prestataireDao($data);
      return $notification_has_prestataire->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/notification_has_prestataire",
     *     tags={"notification_has_prestataire"},
     *     summary="delete  notification_has_prestataire by ID",
     *     description="Deletess a single notification_has_prestataire",
     *     operationId="deletenotification_has_prestataireById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of notification_has_prestataire to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *        
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="notification_has_prestataire not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $notification_has_prestataire = new Notification_has_prestataireDao($data);
      return $notification_has_prestataire->delete($data);
    }
	
	

}

?>