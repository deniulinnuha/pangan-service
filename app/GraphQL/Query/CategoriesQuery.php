<?php 
namespace App\GraphQL\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Category;
use Folklore\GraphQL\Support\SelectFields;
/**
 * User Query
 */
class CategoriesQuery extends Query
{
	
	protected $attributes = [
		'name' => 'categories'
	];
	public function type()
	{
		return Type::listOf(GraphQL::type('Category'));
	}
	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::string()],
			'name' => ['name' => 'name', 'type' => Type::string()]
		];
	}
	public function resolve($root, $args)
	{
		$where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['title'])) {
                $query->where('title','like','%'.$args['email'].'%');
            }
        };
		// $with = array_keys($fields->getRelations());
		return Category::with('comodities')->where($where)
		->select()->paginate();
		
	}
}