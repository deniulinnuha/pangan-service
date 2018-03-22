<?php 
namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Facades\GraphQL;
use Folklore\GraphQL\Support\Type as GraphQLType;
/**
 * User Type
 */
class CategoryType extends GraphQLType
{
	
	protected $attributes = [
		'name' => 'Category',
		'description' => 'A Category',
		'model' => Category::class
	];
	public function fields()
	{
		return [
			'id' => [
				'type' => Type::nonNull(Type::string()),
				'description' => 'The id of category'
			],
			'name' => [
				'type' => Type::string(),
				'description' => 'The name of category'
			],
			'comodities' => [
                'type' => Type::listOf(GraphQL::type('Comodities')),
                'description' => 'The comodities',
            ]
		];
	}
}