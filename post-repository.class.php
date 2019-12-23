<?php

class PostRepository
{
    public function save(Post $post)
    {
        $posts = $this->getAll();

        $posts[] = $post;

        $this->store($posts);
    }

    public function getAll()
    {
        $fileContent = file_get_contents('posts.json');
        // [{'title': 'dsadasd'}, {'title': 'dsadasda'}]

        $decodedContent = json_decode($fileContent, true);
        // array(array('title' => 'dsadasd'), array('title' => 'dsadasda'))

        $posts = [];
        foreach ($decodedContent as $postData) {
            // $postData = array('title' => 'dsadasd')
            $posts[] = new Post($postData['title']);
        }

        return $posts;
    }

    public function remove($title)
    {
        $posts = $this->getAll();
        foreach ($posts as $index => $post) {
            if ($post->title === $title) {
                unset($posts[$index]);
            }
        }

        $this->store($posts);
    }

    private function store($posts)
    {
        $postString = json_encode($posts, JSON_PRETTY_PRINT);

        file_put_contents('posts.json', $postString);
    }
}
