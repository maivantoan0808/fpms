<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get number of records
     * @return int
     */
    public function count()
    {
        return $this->model->count();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update($id, array $data)
    {
        $this->model = $this->find($id);

        return $this->save($this->model, $data);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function where($id, $col)
    {
        return $this->model->where($id, $col)->get();
    }

    /**
     * Save input data
     * @param $model
     * @param array $data
     * @return mixed
     */
    public function save($model, array $data)
    {
        $model->fill($data);

        $model->save();

        return $model;
    }

    /**
     * Delete a model
     * @param $id
     * @return mixeds
     * @throws \Exception
     */
    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        return $model->delete();
    }

    /**
     * Paginate records
     * @param int $number
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function page($number, string $orderBy = 'created_at', string $sortBy = 'desc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->paginate($number);
    }

    /**
     * Load relations
     *
     * @param array|string $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }
}
