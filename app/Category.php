<?php


namespace App;


class Category
{
    public $category_name,$category_color;
    public  function vergin(){
        $instance = new self();
        return $instance;
    }
    public function __construct($category_name)
    {
        $this->category_name = $category_name;
        $this->category_color = $this->colors[$category_name];
    }


    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @return mixed
     */
    public function getCategoryColor()
    {
        return $this->category_color;
    }

    /**
     * @param mixed $category_name
     */
    public function setCategoryName($category_name): void
    {
        $this->category_name = $category_name;
    }

    /**
     * @param mixed $category_color
     */
    public function setCategoryColor($name): void
    {
        $this->category_color = $name;
    }
    public $colors = [
            'Action' => '#ec5a1a',
            'Adventure' => '#1692bb',
            'Animation' => '#6D6FD7',
            'Biography' => '#A08175',
            'Comedy' => '#49C398',
            'Crime' => '#712033',
            'Documentary' => '#4B829A',
            'Drama' => '#C16451',
            'Family' => '#8D7EA8',
            'Fantasy' => '#5E2A10',
            'Film-Noir' => '#8C8C8C',
            'Game-Show' => '#4984B3',
            'History' => '#C5C6C6',
            'Horror' => '#021C27',
            'Music' => '#EC4939',
            'Musical' => '#FDDE4F',
            'Mystery' => '#C65423',
            'News' => '#E1D1BA',
            'Reality-TV' => '#B74959',
            'Romance' => '#BE093E',
            'Sci-Fi' => '#E1C0E4',
            'Sport' => '#EEFB83',
            'Talk-Show' => '#BFDFE4',
            'Thriller' => '#F9B97A',
            'War' => '#A07170',
            'Western' => '#FBC18C',
            // etc
        ];



}
