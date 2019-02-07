<?php
# Generated by protoc-gen-twirp_php , DO NOT EDIT.
# clientcompat.proto

namespace Twirp\Clientcompat;

use Google\Protobuf\Internal\Message;

class CompatServiceClient implements CompatServiceInterface
{
    /**
     * @var \GuzzleHttp\Client 
     */
    private $client;
    private $useJson;

    public function __construct(\GuzzleHttp\Client $client, $useJson = false)
    {
        $this->client = $client;
        $this->useJson = $useJson;
    }

    public function method(Req $req): Resp
    {
        $res = $this->makeRequest('Method', $this->serialize($req));
        $out = new Resp();
        $this->deserialize($out, $res->getBody()->getContents());
        return $out;
    }

    public function noopMethod(PBEmpty $empty): PBEmpty
    {
        $res = $this->makeRequest('NoopMethod', $this->serialize($empty));
        $out = new PBEmpty();
        $this->deserialize($out, $res->getBody()->getContents());
        return $out;
    }

    private function makeRequest($method, $in)
    {
        $res = $this->client->post(self::SERVICE_NAME . '/' . $method, [
            'body' => $in,
            'http_errors' => false,
            'headers' => [
                'Content-Type' => $this->useJson ? 'application/json' : 'application/protobuf'
            ]
        ]);
        if ($res->getStatusCode() != 200) {
            throw new CompatServiceException($res);
        }
        return $res;
    }

    private function serialize(Message $message)
    {
        if ($this->useJson) {
            return $message->serializeToJsonString();
        }
        return $message->serializeToString();
    }

    private function deserialize(Message $message, $data)
    {
        if ($this->useJson) {
            return $message->mergeFromJsonString($data);
        }
        return $message->mergeFromString($data);
    }
}