<?php
# Generated by protoc-gen-twirp_php, DO NOT EDIT.
# source: haberdasher.proto

namespace AppBundle\Twirp;

interface HaberdasherInterface
{
    const SERVICE_NAME = 'twirp.example.haberdasher.Haberdasher';

    /**
     * @rpc twirp.example.haberdasher.Haberdasher/MakeHat
     * @param Size $size
     * @return Hat
     */
    public function makeHat(Size $size): Hat;
}
