<?php

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;
    public function setLink(string $link): self
    {
        $this->link= $link;
        return $this;
    }

    public function getParseData(): void
    {

        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,author,link,description,pubDate,category,enclosure::url]'
            ]

        ]);
        foreach ($data as $item) {
            foreach ($item as $value) {
                $news = new News();
                $news->title = $value['title'];
                $news->author = $value['author'];
                $news->body = $value['description'];
                $news->image = $value['enclosure::url'];
                $news->save();
            }
        }
        $arrName = explode('/', $this->link);
        $fileName = end($arrName) . ".json";
        $serialize = json_encode($data);
        Storage::disk('local')->put('/parsing/' . $fileName, $serialize);

    }
}

