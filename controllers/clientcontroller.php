<?php

require_once(__DIR__ ."/../dao/clientdao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class ClientController extends Authentification{
 /**
     * @OA\Get(
     *     path="/client",
     *     tags={"client"},
     *     summary="Find client by ID",
     *     description="Returns a single client",
     *     operationId="getclientById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of client to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Client"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="client not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $client = new ClientDao(null);
      $id = $_GET["id"];
      return $client->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/clients",
     *   tags={"client"},
	 *   summary="list clients",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with clients"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $client = new ClientDao(null);
      return $client->getall();
    }
	  /**
     * Add a new client 
     * 
     * @OA\Post(
     *     path="/client",
     *     tags={"client"},
     *     operationId="addClient",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Client")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $client = new ClientDao($data);
      return $client->create($data);
    }
	  /**
     * Edit an existing client 
     * 
     * @OA\Patch(
     *     path="/client",
     *     tags={"client"},
     *     operationId="editClient",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Client")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $client = new ClientDao($data);
      return $client->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/client",
     *     tags={"client"},
     *     summary="delete  client by ID",
     *     description="Deletess a single client",
     *     operationId="deleteclientById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of client to delete",
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
     *         description="client not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $client = new ClientDao($data);
      return $client->delete($data);
    }
	
	

}

?>