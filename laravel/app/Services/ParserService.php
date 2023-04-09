<?php

namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;
    public function setLink(string $link): self
    {
        $this->link= $link;
        return $this;
    }

    public function getParseData(): array
    {
        $xml = XmlParser::load($this->link);
        return $xml->parse([
            'news'=>[
                'uses'=>'channel.item[title,author,link,description,pubDate,category,enclosure::url]'
            ]

           ]);
    }
}

