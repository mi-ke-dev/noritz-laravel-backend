<?php

declare(strict_types=1);

namespace App\Domain\ClaimForms\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Routing\Controller;
use Laravel\Jetstream\RedirectsActions;
use Illuminate\Support\Str;
use Laravel\Vapor\Http\Controllers\SignedStorageUrlController as VaporSignedStorageUrlController;


class SignedStorageUrlController extends VaporSignedStorageUrlController
{

    public function store(Request $request)
    {
        $this->ensureEnvironmentVariablesAreAvailable($request);

        $bucket = $request->input('bucket') ?: $_ENV['AWS_BUCKET'];

        $client = $this->storageClient();

        $uuid = (string) Str::uuid();

        $signedRequest = $client->createPresignedRequest(
            $this->createCommand($request, $client, $bucket, $key = ('tmp/'.$uuid)),
            '+5 minutes'
        );

        $uri = $signedRequest->getUri();

        return response()->json([
            'uuid' => $uuid,
            'bucket' => $bucket,
            'key' => $key,
            'url' => 'https://'.$uri->getHost().$uri->getPath().'?'.$uri->getQuery(),
            'headers' => $this->headers($request, $signedRequest),
        ], 201);
    }


}
