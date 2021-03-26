<?php

require_once(__DIR__ ."/../dao/prestatairedao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class PrestataireController extends Authentification{
 /**
     * @OA\Get(
     *     path="/prestataire",
     *     tags={"prestataire"},
     *     summary="Find prestataire by ID",
     *     description="Returns a single prestataire",
     *     operationId="getprestataireById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of prestataire to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Prestataire"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="prestataire not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $prestataire = new PrestataireDao(null);
      $id = $_GET["id"];
      return $prestataire->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/prestataires",
     *   tags={"prestataire"},
	 *   summary="list prestataires",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with prestataires"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $prestataire = new PrestataireDao(null);
      return $prestataire->getall();
    }
	  /**
     * Add a new prestataire 
     * 
     * @OA\Post(
     *     path="/prestataire",
     *     tags={"prestataire"},
     *     operationId="addPrestataire",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Prestataire")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $prestataire = new PrestataireDao($data);
      return $prestataire->create($data);
    }
	  /**
     * Edit an existing prestataire 
     * 
     * @OA\Patch(
     *     path="/prestataire",
     *     tags={"prestataire"},
     *     operationId="editPrestataire",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Prestataire")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $prestataire = new PrestataireDao($data);
      return $prestataire->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/prestataire",
     *     tags={"prestataire"},
     *     summary="delete  prestataire by ID",
     *     description="Deletess a single prestataire",
     *     operationId="deleteprestataireById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of prestataire to delete",
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
     *         description="prestataire not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $prestataire = new PrestataireDao($data);
      return $prestataire->delete($data);
    }
	
	

}

?>