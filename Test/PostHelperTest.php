<?php
use PostHelper\PostHelper;
class PostHelperTest extends PHPUnit\Framework\TestCase
{

    public function testGetAllPost() : void
    {
        $post = new PostHelper(); 
        $this->assertNotEmpty($post->getAll());
    }

    public function testGetByID() : void
    {
        $post = new PostHelper(); 
        $this->assertNotEmpty($post->getByID(4));
    }

    public function testGetByUserID() : void
    {
        $post = new PostHelper(); 
        $this->assertNotEmpty($post->getByUserID(4));
    }

    public function testCreatePost() : void
    {
        $data = new \stdClass;
        $data->title = "Post baru";
        $data->body = "ini adalah post yang baru ditambahkan";
        $data->userId = 11;
        $post = new PostHelper(); 
        $this->assertNotEmpty($post->createPost($data));
    }

    public function testUpdatePost() : void
    {
        $data = new \stdClass;
        $data->title = "Post baru";
        $data->body = "ini adalah post yang baru ditambahkan";
        $data->userId = 11;
        $id = 5;
        $post = new PostHelper(); 
        $this->assertNotEmpty($post->updatePost($data, $id));
    }

    public function testDeletePost() : void
    {
        $id = 5;
        $post = new PostHelper(); 
        $this->assertNotEmpty($post->deletePost($id));
    }
}
