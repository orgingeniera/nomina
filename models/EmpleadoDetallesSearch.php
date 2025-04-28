<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpleadoDetalles;

/**
 * EmpleadoDetallesSearch represents the model behind the search form of `app\models\EmpleadoDetalles`.
 */
class EmpleadoDetallesSearch extends EmpleadoDetalles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'empleado_id'], 'integer'],
            [['fecha_contratacion', 'departamento', 'cargo', 'tipo_contrato_id', 'frecuencia_pago', 'horario_trabajo', 'eps', 'afp', 'caja_compensacion', 'created_at', 'updated_at'], 'safe'],
            [['salario_base'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = EmpleadoDetalles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'empleado_id' => $this->empleado_id,
            'fecha_contratacion' => $this->fecha_contratacion,
            'salario_base' => $this->salario_base,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'departamento', $this->departamento])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'tipo_contrato_id', $this->tipo_contrato_id])
            ->andFilterWhere(['like', 'frecuencia_pago', $this->frecuencia_pago])
            ->andFilterWhere(['like', 'horario_trabajo', $this->horario_trabajo])
            ->andFilterWhere(['like', 'eps', $this->eps])
            ->andFilterWhere(['like', 'afp', $this->afp])
            ->andFilterWhere(['like', 'caja_compensacion', $this->caja_compensacion]);

        return $dataProvider;
    }
}
