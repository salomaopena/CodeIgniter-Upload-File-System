<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        return view('upload-form', $data);
    }

    public function uploadSubmit()
    {
        //echo('<pre>');
        //print_r($this->request->getFiles());
        //print_r($this->request->getFile('file_upload'));
        //echo('</pre>');
        //exit;

        //verify if file is valid

        //if($this->request->getFile('file_upload')->isValid()){
        //    echo 'Ok';
        //}
        //else{
        //    echo 'Not ok';
        //}

        //get file from variable
        $file = $this->request->getFile('file_upload');
        //echo('<pre>');
        //print_r($file);
        //if($file->isValid()){
        //    echo 'OK';
        //}
        //else{
        //    echo 'Not OK';
        //}

        //obter dados que realmente interessam de um ficheiro
        echo '<br>';
        echo 'Nome: ' . $file->getName();
        //ou
        echo '<br>';
        echo 'Nome: ' . $file->getClientName();

        echo '<br>';
        echo ' Nome temporaio: ' . $file->getTempName();

        echo '<br>';
        echo 'Extensao: ' . $file->getExtension();

        echo '<br>';
        echo 'Tipo de ficheiro: ' . $file->getMimeType();

        echo '<br>';
        echo 'Tamanho: ' . $file->getSize();

        echo '<br>';
        echo 'Tamanho em Kb: ' . $file->getSizeByUnit('kb');

        echo '<br>';
        echo 'Tamanho em Mb: ' . $file->getSizeByUnit('mb');

        //validacao de arquivo
        //if (!$file->isValid()) {
        //    return redirect()->back()->with('error', 'Ficheiro nao carregado!');
       // }

        //validation
        $validation = $this->validate([
            'file_upload' => [
                'label' => 'Ficheiro',
                'rules' => [
                    'uploaded[file_upload]',
                    'mime_in[file_upload,image/jpg,image/jpeg,image/png,application/pdf]',
                    'max_size[file_upload,1024]',
                ],
                'errors' => [
                    'uploaded' => 'Ficheiro nao carregado!',
                    'mime_in' => 'Tipo de ficheiro invalido!',
                    'max_size' => 'Tamanho do ficheiro excede o limite permitido!'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->with('validation_errors', $this->validator->getErrors());
        }

        //$file = $this->request->getFile('file_upload');

        //mover para a pasta padrao
        
        //$file->move(WRITEPATH.'uploads');

        //$file->move(WRITEPATH.'uploads','novo_nome.jpg');
        
        //mover para a pasta com data
        //$folderName = rtrim(date('Ymd'), '/');
        //$file->move(WRITEPATH.'uploads/'.$folderName);

        //echo('<br>Pasta: '.$folderName);

        //rename the file
        //$file->move(WRITEPATH.'uploads', 'novo_nome.'.$file->getClientExtension());

        //generate a random name
        //$file->move(WRITEPATH.'uploads', $file->getRandomName());

        //generate a random name with extension
        //$fileName = $file->getRandomName().'.'.$file->getClientExtension();
        //$file->move(WRITEPATH.'uploads', $fileName);

        //echo('Nome do ficheiro: '.$fileName);

        //generate a random name with extension and extension type
        //$file->move(WRITEPATH.'uploads', $file->getRandomName().'.'.$file->getClientExtension().'.'.$file->getClientMediaType());

        //generate a random name with extension and extension type with size

        //$file->move(WRITEPATH.'uploads',$file->getRandomName());

        //move the file to the desired directory
        //$file->move(ROOTPATH.'public/uploads', $file->getClientName());

        //return redirect()->to('/')->with('success', 'Ficheiro carregado com sucesso!');
    }
}
