CREATE TRIGGER verificaDia
BEFORE INSERT ON Ticket
WHEN EXISTS (
    SELECT *
    FROM Ticket
    WHERE datas = NEW.datas
    AND (
        (strftime('%m', datas) IN ('01', '03', '05', '07', '08', '10', '12') AND strftime('%d', datas) > '31')
        OR (strftime('%m', datas) IN ('04', '06', '09', '11') AND strftime('%d', datas) > '30')
        OR (
            strftime('%m', datas) = '02'
            AND (
                (
                    (strftime('%Y', datas) % 4 = 0)
                    OR (strftime('%Y', datas) % 100 = 0 AND strftime('%Y', datas) % 400 != 0)
                )
                AND strftime('%d', datas) > '29'
            )
            OR (strftime('%d', datas) > '28')
        )
        OR (strftime('%d', datas) < '01')
    )
)
BEGIN
    SELECT raise(abort, 'Invalid day. Please provide a valid date.');
END;