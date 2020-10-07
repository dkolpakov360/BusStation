## Автобусный парк
Требуется реализовать возможность администрирования водителей автопарка через REST на Yii2 с БД MySQL. Обязательно использование миграций и phpDoc.

Объект «Водитель» содержит следующие данные, которые необходимо заполнить миграцией:
ФИО
Дата рождения
Модели автобусов, которыми способен управлять водитель (relation model)
Наименование (Марка - Модель - Год выпуска и тд)
Средняя скорость движения

### Список автобусов
Список автобусов, моделей, годов выпуска. Достаточно отдельной таблицы со значениями “Наименования” и “Средней скорости движения”.

### Список водителей
Должно присутствовать разбиение на страницы при получении списка всех водителей.
Водители должны быть отсортированы по ФИО.
У водителя должен отображаться его возраст (вычислять по дате рождения).

### Расчет времени прохождения
Необходим метод получения времени прохождения, для всех водителей и для конкретного в частности (передаётся id водителя), расстояния между двумя городами, которые передаются параметрами в запросе, например, Москва и Казань. Для расчета расстояния между указанными городами нужно использовать интеграцию со сторонним сервисом. 

При получении времени для всех водителей - список должен быть отсортирован от меньшего времени прохождения к большему, и так же иметь разбиение на страницы.
В этом случае у водителя выводится минимальное время между этими городами (в днях), учитывая, что водитель за сутки может ехать не более 8 часов.

### Формат объекта водитель при получении минимального времени прохождения:
```json
{
    "id": "...",
    "name": "...",
    "birth_date": "...",
    "age": "...",
    "travel_time": "..."
}
```
