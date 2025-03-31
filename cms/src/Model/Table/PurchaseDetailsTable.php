<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseDetails Model
 *
 * @property \App\Model\Table\PurchasesTable&\Cake\ORM\Association\BelongsTo $Purchases
 *
 * @method \App\Model\Entity\PurchaseDetail newEmptyEntity()
 * @method \App\Model\Entity\PurchaseDetail newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PurchaseDetail> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseDetail get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PurchaseDetail findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PurchaseDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PurchaseDetail> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseDetail|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PurchaseDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseDetail>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseDetail> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseDetail>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseDetail> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PurchaseDetailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('purchase_details');
        $this->setDisplayField('product');
        $this->setPrimaryKey('id');

        $this->belongsTo('Purchases', [
            'foreignKey' => 'purchase_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('purchase_id')
            ->notEmptyString('purchase_id');

        $validator
            ->scalar('product')
            ->maxLength('product', 255)
            ->requirePresence('product', 'create')
            ->notEmptyString('product');

        $validator
            ->integer('amount')
            ->notEmptyString('amount');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['purchase_id'], 'Purchases'), ['errorField' => 'purchase_id']);

        return $rules;
    }
}
