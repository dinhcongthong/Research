<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * Summary of model
     *
     * @var mixed
     */
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Summary of getModel
     *
     * @return void
     */
    abstract public function getModel();

    /**
     * Summary of setModel
     *
     * @return void
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    public function paginate($itemPerPage, array $conditions = [], array $orderBy = [], array $search = [], array $relationships = [])
    {
        $query = $this->model->where($conditions);
        if (!empty($relationships)) {
            $query = $query->with($relationships);
        }
        if (!empty($search)) {
            $query = $query->where(function ($query) use ($search) {
                foreach ($search as $key => $value) {
                    if ($key == array_key_first($search)) {
                        $query = $query->where($key, 'LIKE', '%' . $value . '%');
                    } else {
                        $query = $query->orWhere($key, 'LIKE', '%' . $value . '%');
                    }
                }
            });
        }
        if (!empty($orderBy)) {
            foreach ($orderBy as $key => $value) {
                $query = $query->orderBy($key, $value);
            }
        }
        return $query->paginate($itemPerPage);
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllWithTrashed()
    {
        return $this->model->withTrashed()->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    /**
     * Get one
     * @param $conditions
     * @return mixed
     */
    public function findOneBy(array $conditions, array $relationships = [])
    {
        $query = $this->model;
        if (!empty($relationships)) {
            $query = $query->with($relationships);
        }
        return $query->where($conditions)->first();
    }

    /**
     * Get one
     * @param $conditions
     * @return mixed
     */
    public function findOneByToday(array $conditions, array $relationships = [])
    {
        $query = $this->model;
        if (!empty($relationships)) {
            $query = $query->with($relationships);
        }
        return $query->where($conditions)->whereDate('created_at', now())->first();
    }

    /**
     * Get one
     * @param $conditions
     * @return mixed
     */
    public function findBy(array $conditions, array $orderBy = [], array $relationships = [])
    {
        $query = $this->model;
        if (!empty($relationships)) {
            $query = $query->with($relationships);
        }
        $query = $query->where($conditions);
        if (!empty($orderBy)) {
            foreach ($orderBy as $key => $value) {
                $query = $query->orderBy($key, $value);
            }
        }
        return $query->get();
    }

    /**
     * Get one
     * @param $conditions
     * @return mixed
     */
    public function findByToday(array $conditions, array $orderBy = [], array $relationships = [])
    {
        $query = $this->model;
        if (!empty($relationships)) {
            $query = $query->with($relationships);
        }
        $query = $query->where($conditions)->whereDate('created_at', now());
        if (!empty($orderBy)) {
            foreach ($orderBy as $key => $value) {
                $query = $query->orderBy($key, $value);
            }
        }
        return $query->get();
    }

    /**
     * Get one or create new
     * @param $id
     * @return mixed
     */
    public function findOrNew($id)
    {
        $result = $this->model->findOrNew($id);

        return $result;
    }

    /**
     * Get one
     * @param $id
     * @return mixed or 404 if null.
     */
    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);

        return $result;
    }

    public function first()
    {
        return $this->model->first();
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
    /**
     * Summary of updateOrCreate
     * @param array $condition
     * @param array $attributes
     * @return mixed
     */
    public function updateOrCreate(array $condition, array $attributes)
    {
        return $this->model->updateOrCreate($condition, $attributes);
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
