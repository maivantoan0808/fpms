<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class TreeViewController extends Controller
{
    protected $project;

    public function __construct(ProjectRepositoryInterface $project)
    {
        $this->project = $project;
    }

    /**
     * Get Tree View
     * @param int $id
     * @return json
     */
    public function getTree($id)
    {
        $project = $this->project->findWithRelations($id, 'documents');

        $datas = $project->documents->toArray();

        $itemsByReference = [];
        foreach ($datas as $key => &$item) {
            $itemsByReference[$item['id']] = &$item;
            $itemsByReference[$item['id']]['children'] = [];
            $itemsByReference[$item['id']]['datas'] = new \StdClass();
        }
        foreach ($datas as $key => &$item) {
            if ($item['document_parent'] && isset($itemsByReference[$item['document_parent']])) {
                $itemsByReference [$item['document_parent']]['children'][] = &$item;
            }
        }
        foreach ($datas as $key => &$item) {
            if (($item['document_parent']) && isset($itemsByReference[$item['document_parent']])) {
                unset($datas[$key]);
            }
        }
        
        return json_encode(array_values($datas));
    }
}
