<?php

require_once(__DIR__ ."/../dao/notificationdao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class NotificationController extends Authentification{
 /**
     * @OA\Get(
     *     path="/notification",
     *     tags={"notification"},
     *     summary="Find notification by ID",
     *     description="Returns a single notification",
     *     operationId="getnotificationById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of notification to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Notification"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="notification not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $notification = new NotificationDao(null);
      $id = $_GET["id"];
      return $notification->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/notifications",
     *   tags={"notification"},
	 *   summary="list notifications",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with notifications"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $notification = new NotificationDao(null);
      return $notification->getall();
    }
	  /**
     * Add a new notification 
     * 
     * @OA\Post(
     *     path="/notification",
     *     tags={"notification"},
     *     operationId="addNotification",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Notification")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $notification = new NotificationDao($data);
      return $notification->create($data);
    }
	  /**
     * Edit an existing notification 
     * 
     * @OA\Patch(
     *     path="/notification",
     *     tags={"notification"},
     *     operationId="editNotification",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Notification")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $notification = new NotificationDao($data);
      return $notification->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/notification",
     *     tags={"notification"},
     *     summary="delete  notification by ID",
     *     description="Deletess a single notification",
     *     operationId="deletenotificationById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of notification to delete",
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
     *         description="notification not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $notification = new NotificationDao($data);
      return $notification->delete($data);
    }
	
	

}

?>