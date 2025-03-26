
# Instrukcja uruchomienia aplikacji ToDo

Aby uruchomić aplikację, wykonaj następujące kroki:

### 1. Klonowanie repozytorium
Aby pobrać projekt na swoją maszynę, użyj poniższego polecenia:

```bash
git clone https://github.com/cheetos22/todo.git
```

### 2. Wejście do katalogu projektu
Przejdź do folderu, który został stworzony podczas klonowania repozytorium:

```bash
cd todo
```

### 3. Instalowanie zależności
Zainstaluj wszystkie zależności projektu za pomocą polecenia Composer:

```bash
composer install
```

### 4. Uruchomienie serwera lokalnego
Uruchom serwer lokalny, aby uruchomić aplikację:

```bash
php artisan serve
```

Po wykonaniu tych kroków aplikacja będzie dostępna na lokalnym serwerze.

Przejdź pod lokalny adres serwera (np. `http://localhost:8000`), zarejestruj nowe konto (byle jakie), a następnie przejdź do zakładki **ToDo List**.

W edycji zadania znajdziesz przycisk umożliwiający generowanie publicznych linków. Wygenerowany link będzie ważny tylko przez 1 minutę.
