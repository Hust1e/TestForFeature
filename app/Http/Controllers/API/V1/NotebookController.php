<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class NotebookController extends BaseController
{
    use HttpResponses;

    public function index()
    {
        $notebooks = Notebook::paginate(10);
        return new NotebookResource($notebooks);
    }

    public function store(StoreNotebookRequest $request)
    {
        $data = $request->validated($request->all);
        $notebook = Notebook::create($data);
        return $this->success($notebook, '', 201);
    }

    public function show(Request $request)
    {
        if($this->service->isExist($request->notebook)){
            $notebook = Notebook::find($request->notebook);
            return $this->success($notebook);
        }
        return $this->fail(404, 'This notebook not exist');
    }

    public function update(UpdateNotebookRequest $request)
    {
        if($this->service->isExist($request->notebook)){
            $notebook = Notebook::find($request->notebook);
            $notebook->update($request->all());
            return $this->success($notebook, 'This notebook successfully updated', 200);
        }
        return $this->fail(404, 'This notebook not exist');

    }
    public function destroy(Request $request)
    {
        if($this->service->isExist($request->notebook)){
            $notebook = Notebook::find($request->notebook);
            $notebook->delete();
            return $this->success(null, '', 204);
        }
        return $this->fail(404,'This notebook not exist');
    }
}
