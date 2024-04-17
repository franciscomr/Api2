<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\BranchRequest;
use App\Http\Resources\Api\Company\BranchCollection;
use App\Http\Resources\Api\Company\BranchResource;
use App\Http\Responses\JsonApiExceptionResponseObject;
use App\Http\Responses\ThrowableJsonApiExceptionResponse;
use App\Models\Api\Company\Branch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    public function index()
    {
        //get request
        //pass to query resolver
        //tranform to Collection
        //return response
        $branches = BranchCollection::make(Branch::all());
        return $branches;
    }

    public function store(BranchRequest $request): JsonResponse
    {
        $model = new Branch();
        $model->fill($request->validated());
        $model->save();
        return response()->json([BranchResource::make($model)], Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        try {
            $branch = Branch::findOrFail($id);
            return response()->json([BranchResource::make($branch)]);
        } catch (\Exception $e) {
            $responseObject = new JsonApiExceptionResponseObject();
            $responseObject->setMessage('Resource Not Found');
            $responseObject->setDetail('Resource with id: ' . $id . ' Not Found');
            $responseObject->setStatusCode(Response::HTTP_NOT_FOUND);
            throw new ThrowableJsonApiExceptionResponse($responseObject);
        }
    }

    public function update(BranchRequest $request, int $id): JsonResponse
    {
        try {
            $branch = Branch::findOrFail($id);
            $branch->fill($request->validated());
            $branch->save();
            return response()->json([BranchResource::make($branch)]);
        } catch (\Exception $e) {
            $responseObject = new JsonApiExceptionResponseObject();
            $responseObject->setMessage('Could Not Update Resource');
            $responseObject->setDetail('Resource with id: ' . $id . ' Not Found');
            $responseObject->setStatusCode(Response::HTTP_NOT_FOUND);
            throw new ThrowableJsonApiExceptionResponse($responseObject);
        }
    }
}
