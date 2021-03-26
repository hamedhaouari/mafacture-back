<?php

require_once(__DIR__ ."/../dao/userdao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class UserController extends Authentification{
 /**
     * @OA\Get(
     *     path="/user",
     *     tags={"user"},
     *     summary="Find user by ID",
     *     description="Returns a single user",
     *     operationId="getuserById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of user to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="user not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $user = new UserDao(null);
      $id = $_GET["id"];
      return $user->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/users",
     *   tags={"user"},
	 *   summary="list users",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with users"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $user = new UserDao(null);
      return $user->getall();
    }
	  /**
     * Add a new user 
     * 
     * @OA\Post(
     *     path="/user",
     *     tags={"user"},
     *     operationId="addUser",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/User")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $user = new UserDao($data);
      return $user->create($data);
    }
	  /**
     * Edit an existing user 
     * 
     * @OA\Patch(
     *     path="/user",
     *     tags={"user"},
     *     operationId="editUser",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/User")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $user = new UserDao($data);
      return $user->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/user",
     *     tags={"user"},
     *     summary="delete  user by ID",
     *     description="Deletess a single user",
     *     operationId="deleteuserById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of user to delete",
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
     *         description="user not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $user = new UserDao($data);
      return $user->delete($data);
    }
	
	

}

?>