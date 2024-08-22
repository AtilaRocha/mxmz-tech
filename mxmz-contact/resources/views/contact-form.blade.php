<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <div class="contact-form">
            <h1>Faça parte da nossa equipe!</h1>
            <p>Reserve um momento para preencher nosso formulário, retornaremos em breve.</p>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="contact-form" method="POST" action="{{ route('contact.form') }}" enctype="multipart/form-data">
                @csrf
                <div class="column">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Digite seu nome">

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Digite seu e-mail">

                    <label for="phone">Número de Contato:</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Digite seu número de contato">

                    <label for="summary">Resumo Profissional:</label>
                    <textarea rows="4" name="summary" id="summary" placeholder="Digite seu resumo profissional">{{ old('summary') }}</textarea>
                </div>

                <div class="column">
                    <label for="description">Descrição:</label>
                    <textarea rows="4" name="description" id="description" placeholder="Digite a descrição">{{ old('description') }}</textarea>
                    



                    <div class="file-input">
    <label for="file" class="file-input-label">
        Anexar arquivo
        <input type="file" name="file" id="file" class="file-input-field" onchange="updateFileName()">
    </label>
    <div id="file-name" class="file-name">Nenhum arquivo selecionado</div>
</div>





                </div>

                </div>
                
                <div class="form-actions">
                    <input type="submit" value="Enviar">
    
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateFileName() {
            const fileInput = document.getElementById('file');
            const fileName = document.getElementById('file-name');
            if (fileInput.files.length > 0) {
                fileName.textContent = fileInput.files[0].name;
            } else {
                fileName.textContent = 'Nenhum arquivo selecionado';
            }
        }
    </script>
</body>
</html>
