<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 */
class ApplicationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Applications->find()
            ->contain(['Staffs', 'Departments', 'Types', 'Users']);
        $applications = $this->paginate($query);

        $this->set(compact('applications'));
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $application = $this->Applications->get($id, contain: ['Staffs', 'Departments', 'Types', 'Users']);
        $this->set(compact('application'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $application = $this->Applications->newEmptyEntity();
        if ($this->request->is('post')) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $staffs = $this->Applications->Staffs->find('list', limit: 200)->all();
        $departments = $this->Applications->Departments->find('list', limit: 200)->all();
        $types = $this->Applications->Types->find('list', limit: 200)->all();
        $users = $this->Applications->Users->find('list', limit: 200)->all();
        $this->set(compact('application', 'staffs', 'departments', 'types', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $application = $this->Applications->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $staffs = $this->Applications->Staffs->find('list', limit: 200)->all();
        $departments = $this->Applications->Departments->find('list', limit: 200)->all();
        $types = $this->Applications->Types->find('list', limit: 200)->all();
        $users = $this->Applications->Users->find('list', limit: 200)->all();
        $this->set(compact('application', 'staffs', 'departments', 'types', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $application = $this->Applications->get($id);
        if ($this->Applications->delete($application)) {
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
