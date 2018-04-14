<?php 

/**
 * summary
 */
class Post
{
    /**
     * summary
     */
    public function __construct()
    {
        $this->db=new database();
    }

    public function create($data){
    	$this->db->query(
            'INSERT INTO posts 
            (title, user_id, body) 
            VALUES (:title, :user_id, :body)'
        );
        $this->db->bind(':user_id',$_SESSION['user_id']);
         $this->db->bind(':title',$data['title']);
          $this->db->bind(':body',$data['body']);
        return $this->db->execute();  
          
    }

    public function update($data){
        $this->db->query(
            'UPDATE posts SET 
            title = :title, body = :body 
            WHERE id = :id'
        );
        
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':id',$data['post_id']);
        return $this->db->execute();  
          
    }

    public function getAllPosts(){
    	$this->db->query(
            "SELECT posts.id,posts.title,posts.body,posts.created_at FROM posts 
            INNER JOIN users 
            on posts.user_id=users.id"
        );
        return $this->db->resultset();
    }

    public function getPostById($id){
        $this->db->query(
            "SELECT * FROM posts 
            WHERE id=:id"
        );
        $this->db->bind(':id',$id);
        return $this->db->single();
    }

    public function getPostsByUserId($id){
        $this->db->query(
            "SELECT posts.id,posts.title,posts.body,posts.created_at FROM posts
            INNER JOIN users on
            posts.user_id=users.id 
            WHERE users.id=:id"
        );
        $this->db->bind(':id',$id);
        $posts=$this->db->resultset();
        return $posts;
    }

    public function edit($data){
    	echo 'edit method';
    }

    public function deletePostById($id){
        $this->db->query(
            "DELETE FROM posts
            WHERE id=:id"
        );
        $this->db->bind(':id',$id);
        return $this->db->execute();
    }
}

 ?>