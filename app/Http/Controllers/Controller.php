<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The request instance
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
    /**
     * The response instance
     *
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $responseFactory;

    protected $storage;

    /**
     * Create new controller instance
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Routing\ResponseFactory  $response
     * @param  \Illuminate\Filesystem\FilesystemManager $storage
     * @return void
     */
    public function __construct(Request $request, Response $response, FilesystemManager $storage)
    {
        $this->request = $request;
        $this->responseFactory = $response;
        $this->storage = $storage;
    }
}
