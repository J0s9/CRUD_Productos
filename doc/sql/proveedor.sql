-- LISTAR PROVEEDOR POR ID
CREATE OR REPLACE FUNCTION public.func_proveedor_r(code integer)
	RETURNS TABLE(result json)
	LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON (r)
	FROM(
		SELECT
		p."ID",
		p.proveedor,
		p.ruc,
		p.telefono,
		p.correro
		FROM tm_proveedor p
		INNER JOIN tm_empresa e ON p.empresa = e."ID"
		WHERE
		p."ID"   = code
		AND
		p.estado = TRUE
	)r;
END;
$function$

-- LISTAR PROVEEDOR POR EMPRESA
CREATE OR REPLACE FUNCTION public.func_proveedor_empresa(emp integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
		SELECT
		c."ID",
		c.proveedor,
		c.ruc,
		c.telefono,
		c.direccion,
		c.correo
		FROM tm_proveedor c
		INNER JOIN tm_empresa e ON c.empresa = e."ID"
		WHERE
		c.empresa = emp
		AND
		c.estado  = TRUE
	)r;
END;
$function$

-- CREAR PROVEEDOR
CREATE OR REPLACE FUNCTION public.func_proveedor_c(emp integer, cli character varying, ruc character varying, tlf character varying, direc character varying, email character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_proveedor(empresa,proveedor, ruc, telefono, direccion, correo, creacion, estado)
	VALUES(emp,UPPER(cli),ruc,tlf,UPPER(direc),email,now(),TRUE );
END;
$function$

-- ACTUALIZAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_proveedor_u(id integer, emp integer, cli character varying, r character varying, tlf character varying, direc character varying, email character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_proveedor
	SET
	empresa     = emp,
	proveedor   = upper(cli),
	ruc 	    = r,
	telefono    = tlf,
	direccion   = upper(direc),
	correo      = email
	WHERE
	"ID" = id;
END;
$function$

-- ELIMINAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_proveedor_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_proveedor c
	SET estado = FALSE
	WHERE
	c."ID"     = id;
END;
$function$
