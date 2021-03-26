<?php

require_once(__DIR__ ."/../dao/servicedao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class ServiceController extends Authentification{
 /**
     * @OA\Get(
     *     path="/service",
     *     tags={"service"},
     *     summary="Find service by ID",
     *     description="Returns a single service",
     *     operationId="getserviceById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of service to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Service"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="service not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $service = new ServiceDao(null);
      $id = $_GET["id"];
      return $service->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/services",
     *   tags={"service"},
	 *   summary="list services",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with services"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $service = new ServiceDao(null);
      return $service->getall();
    }
	  /**
     * Add a new service 
     * 
     * @OA\Post(
     *     path="/service",
     *     tags={"service"},
     *     operationId="addService",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Service")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $service = new ServiceDao($data);
      return $service->create($data);
    }
	  /**
     * Edit an existing service 
     * 
     * @OA\Patch(
     *     path="/service",
     *     tags={"service"},
     *     operationId="editService",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Service")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $service = new ServiceDao($data);
      return $service->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/service",
     *     tags={"service"},
     *     summary="delete  service by ID",
     *     description="Deletess a single service",
     *     operationId="deleteserviceById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of service to delete",
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
     *         description="service not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $service = new ServiceDao($data);
      return $service->delete($data);
    }
	
	

}

?>