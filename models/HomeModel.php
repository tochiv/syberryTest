<?php

declare(strict_types=1);

namespace models;

use core\Model;

class HomeModel extends Model
{
    const COUNT_BEST_EMPLOYEES = 3; // Количество лучших сотрудников

    public function getEmployee()
    {
        $query = 'SELECT tr.id, name, hours, date FROM employees e JOIN time_reports tr ON employee_id = e.id ORDER BY date, hours DESC';
        $statement = $this->db->query($query);
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];

        $currentDate = count($data) ? $data[0]['date'] : 0; // Итератор даты
        $count = 0; // Счетчик лучших сотрудников дня

        // Перебор кол-ва часов сотрудников
        for ($i = 0; $i < count($data); $i++) {
            // Проверка перехода на следующий день
            if ($data[$i]['date'] != $currentDate) {
                $count = 0; // Сброс счётчика
                $currentDate = $data[$i]['date']; // Переход на следующий день
            }
            // Выбор первых 3х лучших сотрудников
            if ($count++ < self::COUNT_BEST_EMPLOYEES) {
                $result[$currentDate][] = $data[$i];// Добавление сотрудника
            }
        }

        return $result;

    }
}
