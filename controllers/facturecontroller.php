<?php

require_once(__DIR__ ."/../dao/facturedao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class FactureController extends Authentification{
 /**
     * @OA\Get(
     *     path="/facture",
     *     tags={"facture"},
     *     summary="Find facture by ID",
     *     description="Returns a single facture",
     *     operationId="getfactureById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of facture to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Facture"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="facture not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $facture = new FactureDao(null);
      $id = $_GET["id"];
      return $facture->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/factures",
     *   tags={"facture"},
	 *   summary="list factures",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with factures"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $facture = new FactureDao(null);
      return $facture->getall();
    }
	  /**
     * Add a new facture 
     * 
     * @OA\Post(
     *     path="/facture",
     *     tags={"facture"},
     *     operationId="addFacture",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Facture")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $facture = new FactureDao($data);
      return $facture->create($data);
    }
	  /**
     * Edit an existing facture 
     * 
     * @OA\Patch(
     *     path="/facture",
     *     tags={"facture"},
     *     operationId="editFacture",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Facture")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $facture = new FactureDao($data);
      return $facture->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/facture",
     *     tags={"facture"},
     *     summary="delete  facture by ID",
     *     description="Deletess a single facture",
     *     operationId="deletefactureById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of facture to delete",
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
     *         description="facture not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $facture = new FactureDao($data);
      return $facture->delete($data);
    }
	
	

}

?>