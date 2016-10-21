<?php

namespace Codecraft63\CertsignLogin;

class ResponseParse
{
    private $raw_response;

    private $response;

    public function __construct(string $response)
    {
        $this->raw_response = $response;
        $this->response = $this->parse($response);
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function __call($name, $args)
    {
        if (!isset($this->response[$name])) {
            return null;
        }

        return $this->response[$name];
    }

    private function parse(string $response)
    {
        preg_match('/CertificadoBean : (.+\})/', $response, $matches);

        $data = str_replace("'", "\"", $matches[1]);

        return json_decode($data, true);
    }
}
