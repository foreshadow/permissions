<?php

namespace Wbb\Permissions\Models;

use Illuminate\Database\Eloquent\Model;
use Wbb\Permissions\Contracts\PermissionHasRelations as PermissionHasRelationsContract;
use Wbb\Permissions\Traits\PermissionHasRelations;
use Wbb\Permissions\Traits\Slugable;

class Permission extends Model implements PermissionHasRelationsContract
{
    use Slugable, PermissionHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'model'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}
