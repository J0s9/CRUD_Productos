-- LISTAR SUCURSAL POR ID
CREATE OR REPLACE FUNCTION public.func_sucursal_r(code integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
		SELECT
		s."ID",
		s.empresa,
		s.sucursal
		FROM tm_sucursal s
		INNER JOIN tm_empresa e ON s.empresa = e."ID"
		WHERE
		s."ID"   = code
		AND
		s.estado = TRUE
	)r;
END;
$function$

-- LISTAR SUCURSAL POR EMPRESA
CREATE OR REPLACE FUNCTION public.func_sucursal_empresa(emp integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM (
		SELECT
		s."ID",
		s.empresa,
		s.sucursal
		FROM tm_sucursal s
		INNER JOIN tm_empresa e ON s.empresa = e."ID"
		WHERE
		s.empresa = emp
		AND
		s.estado  = TRUE
	)r;
END;
$function$

-- CREAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_sucursal_c(emp integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_sucursal (empresa, sucursal, creacion, estado)
	VALUES(emp,UPPER(name),now(),TRUE);
END;
$function$

-- ACTUALIZAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_sucursal_u(id integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_sucursal
	SET
	sucursal = UPPER(name)
	WHERE
	"ID" = id;
END
$function$

-- ELIMINAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_sucursal_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_sucursal
	SET estado = FALSE
	WHERE "ID" = id;
END;
$function$

