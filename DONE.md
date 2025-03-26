## ✅ CRUD:
- Pełne operacje CRUD (Create, Read, Update, Delete) na zadaniach, z następującymi polami:
  - **Nazwa zadania** (max 255 znaków, wymagane)
  - **Opis** (opcjonalnie)
  - **Priorytet** (low/medium/high)
  - **Status** (to-do, in progress, done)
  - **Termin wykonania** (data, wymagane)

*Tutaj bym ograniczył wyświetlaną listę do np. 20 stosując paginację stron.*

## ✅ Przeglądanie zadań:
- Filtrowanie listy zadań według **priorytetów, statusu i terminu**.

*Tutaj bym dodał zapamiętanie ustawień filtrów.*

## ✅ Powiadomienia e-mail:
- Powiadomienie e-mail **na 1 dzień przed terminem zadania**.
  - Użyj mechanizmów Laravel (**Queues i Scheduler**).

## ✅ Walidacja:
- Upewnij się, że wszystkie formularze **poprawnie walidują dane**:
  - wymagane pola
  - odpowiedni format daty
  - limity znaków dla pól tekstowych

## ✅ Obsługa wielu użytkowników:
- Każdy użytkownik powinien mieć możliwość **zalogowania się i zarządzania własnymi zadaniami**.
  - Użyj systemu uwierzytelniania Laravela.

## ✅ Udostępnianie zadań bez autoryzacji za pomocą linka z tokenem dostępowym:
- Umożliw użytkownikowi **generowanie linków publicznych do zadań** z tokenem dostępu.
  - Link ma **ograniczony czas działania**, po którym dostęp do zadania zostaje zablokowany.


*Niestety nie udało mi się ruszyć zadań opcjonalnych, miałem tylko 4h wolnego czasu przez 3 dni*
*Na pewno bym wyniusł metody odpowiedzialne za generowanie i wyświetlanie publicznych linków gdzieś do osobnego serwisu*
*Można by było się pokosuć też o napisanie prostych testów i dodać testy architektoniczne z pest'a*



