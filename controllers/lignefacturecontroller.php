<?php

require_once(__DIR__ ."/../dao/lignefacturedao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class LignefactureController extends Authentification{
 /**
     * @OA\Get(
     *     path="/lignefacture",
     *     tags={"lignefacture"},
     *     summary="Find lignefacture by ID",
     *     description="Returns a single lignefacture",
     *     operationId="getlignefactureById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of lignefacture to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Lignefacture"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="lignefacture not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $lignefacture = new LignefactureDao(null);
      $id = $_GET["id"];
      return $lignefacture->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/lignefactures",
     *   tags={"lignefacture"},
	 *   summary="list lignefactures",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with lignefactures"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $lignefacture = new LignefactureDao(null);
      return $lignefacture->getall();
    }
	  /**
     * Add a new lignefacture 
     * 
     * @OA\Post(
     *     path="/lignefacture",
     *     tags={"lignefacture"},
     *     operationId="addLignefacture",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Lignefacture")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $lignefacture = new LignefactureDao($data);
      return $lignefacture->create($data);
    }
	  /**
     * Edit an existing lignefacture 
     * 
     * @OA\Patch(
     *     path="/lignefacture",
     *     tags={"lignefacture"},
     *     operationId="editLignefacture",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Lignefacture")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $lignefacture = new LignefactureDao($data);
      return $lignefacture->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/lignefacture",
     *     tags={"lignefacture"},
     *     summary="delete  lignefacture by ID",
     *     description="Deletess a single lignefacture",
     *     operationId="deletelignefactureById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of lignefacture to delete",
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
     *         description="lignefacture not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $lignefacture = new LignefactureDao($data);
      return $lignefacture->delete($data);
    }
	
	

}

?>