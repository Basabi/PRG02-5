<?php

namespace App;

class GameItem
{
    public $id;
    public $title;
    public $description;
    public $image = null;
    private $errors = [];

    const ITEMS = [
        [
            "id" => 1,
            "votes" => 5,
            "title" => "Gusty Garden Galaxy",
            "description" => "Van de game Mario Galaxy",
            "image" => "https://vignette.wikia.nocookie.net/supermariogalaxy/images/f/f0/Gustygarden.jpg/revision/latest/top-crop/width/220/height/220?cb=20090906124429",
            "link" => "https://www.youtube.com/embed/_palSgKvFKk"
        ],
        [
            "id" => 2,
            "votes" => 1,
            "title" => "God of War Theme",
            "description" => "Van de game genaamd God of War",
            "image" => "https://i.ytimg.com/vi/y9hh91-2iaA/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLBL1R-4KtDs04E5krXataCKAT7x0w",
            "link" => "https://www.youtube.com/embed/y9hh91-2iaA"
        ],
        [
            "id" => 3,
            "votes" => 63,
            "title" => "Guardian Theme",
            "description" => "Van de game The Legend of Zelda: Breath Of The Wild",
            "image" => "https://i.ytimg.com/vi/Pq3nncuA1Ak/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLCR4NBAtfKVW2eR9cIRS43Eh4JKlw",
            "link" => "https://www.youtube.com/embed/Pq3nncuA1Ak"
        ],
        [
            "id" => 4,
            "votes" => 5,
            "title" => "Spiderman menu theme",
            "description" => "Van de game spiderman",
            "image" => "https://gamemania-sec.azureedge.net/-/media/Sites/GameMania/Products/Games/S/SPIDER-MAN/Spider-Man-PS4/Screenshots/SpiderMan-2018-Screenshots-02.jpg?v=2+AE8FvimEqtvq8BG/HJwA&Type=Small",
            "link" => "https://www.youtube.com/embed/rD3h0F0W5jM"
        ],
        [
            "id" => 5,
            "votes" => 31,
            "title" => "Dark Souls Menu Theme",
            "description" => "Van de game Dark Souls Remastered",
            "image" => "https://cdn-prod.scalefast.com/public/assets/user/122595/image/eed8617c83ce52e9beb552ad8eb468d3.jpg",
            "link" => "https://www.youtube.com/embed/IMWTyxrBgRU"
        ],
        [
            "id" => 6,
            "votes" => 12,
            "title" => "Megalovania",
            "description" => "Van de game Undertale",
            "image" => "https://i1.sndcdn.com/artworks-000165835053-w43fk6-t500x500.jpg",
            "link" => "https://www.youtube.com/embed/wDgQdr8ZkTw"
        ],
        [
            "id" => 7,
            "votes" => 52,
            "title" => "Pokemon encounter theme",
            "description" => "Van de game Pokemon Red",
            "image" => "https://images-na.ssl-images-amazon.com/images/I/71ZlDsoz7BL._SX342_.jpg",
            "link" => "https://www.youtube.com/embed/eBNcjvxLfFc"
        ]
    ];

    /**
     * @return \string[][]
     */
    static public function all()
    {
        return self::ITEMS;
    }

    /**
     * @param int $id
     * @return string[]
     * @throws \Exception
     */
    static public function find(int $id)
    {
        $itemIndex = array_search($id, array_column(self::ITEMS, 'id'));

        if ($itemIndex === false) {
            throw new \Exception("ID does not exist in GameItem");
        }

        return self::ITEMS[$itemIndex];
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (empty($this->title)) {
            $this->errors['title'] = 'Titel moet ingevuld zijn';
        }
        if (empty($this->description)) {
            $this->errors['description'] = 'Beschrijving moet ingevuld zijn';
        }

        //True/false based on state of errors
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
