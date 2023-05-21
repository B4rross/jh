CREATE TRIGGER check_closed_status
BEFORE UPDATE ON Ticket
WHEN OLD.sttus = 'closed' AND NEW.sttus <> 'closed'
BEGIN
    SELECT RAISE(ABORT, 'Cannot change status from "closed".');
END;